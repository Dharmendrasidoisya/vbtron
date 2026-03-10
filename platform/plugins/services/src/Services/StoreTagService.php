<?php

namespace Botble\Services\Services;

use Botble\ACL\Models\User;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Services\Forms\TagForm;
use Botble\Services\Models\Post;
use Botble\Services\Models\Tag;
use Botble\Services\Services\Abstracts\StoreTagServiceAbstract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreTagService extends StoreTagServiceAbstract
{
    public function execute(Request $request, Post $post): void
    {
        $servicestagsInput = $request->input('stag');

        if (! $servicestagsInput) {
            $servicestagsInput = [];
        } else {
            $servicestagsInput = collect(json_decode($servicestagsInput, true))->pluck('value')->all();
        }

        $servicestags = $post->servicestags->pluck('name')->all();

        if (count($servicestags) != count($servicestagsInput) || count(array_diff($servicestags, $servicestagsInput)) > 0) {
            $post->servicestags()->detach();
            foreach ($servicestagsInput as $tagName) {
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
                    $post->servicestags()->attach($stag->id);
                }
            }
        }
    }
}
