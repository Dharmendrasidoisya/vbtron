<?php

namespace Botble\Application\Application;

use Botble\ACL\Models\User;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Application\Forms\TagForm;
use Botble\Application\Models\Post;
use Botble\Application\Models\Tag;
use Botble\Application\Application\Abstracts\StoreTagServiceAbstract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreTagService extends StoreTagServiceAbstract
{
    public function execute(Request $request, Post $post): void
    {
        $applicationtagsInput = $request->input('stag');

        if (! $applicationtagsInput) {
            $applicationtagsInput = [];
        } else {
            $applicationtagsInput = collect(json_decode($applicationtagsInput, true))->pluck('value')->all();
        }

        $applicationtags = $post->applicationtags->pluck('name')->all();

        if (count($applicationtags) != count($applicationtagsInput) || count(array_diff($applicationtags, $applicationtagsInput)) > 0) {
            $post->applicationtags()->detach();
            foreach ($applicationtagsInput as $tagName) {
                if (! trim($tagName)) {
                    continue;
                }

                $stag = Tag::query()->where('name', $tagName)->first();

                if ($stag === null && ! empty($tagName)) {
                    $form = TagForm::create();

                    $form
                        ->saving(function (TagForm $form) use ($tagName) {
                            $form
                                ->getModel()
                                ->fill([
                                    'name' => $tagName,
                                    'author_id' => Auth::guard()->check() ? Auth::guard()->id() : 0,
                                    'author_type' => User::class,
                                    'status' => BaseStatusEnum::PUBLISHED,
                                ])
                                ->save();

                            $form->setRequest($form->getRequest()->merge(['slug' => $tagName]));
                        });

                    $stag = $form->getModel();
                }

                if (! empty($stag)) {
                    $post->applicationtags()->attach($stag->id);
                }
            }
        }
    }
}
