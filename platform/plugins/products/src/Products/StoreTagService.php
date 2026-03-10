<?php

namespace Botble\Products\Products;

use Botble\ACL\Models\User;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Products\Forms\TagForm;
use Botble\Products\Models\Post;
use Botble\Products\Models\Tag;
use Botble\Products\Products\Abstracts\StoreTagServiceAbstract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreTagService extends StoreTagServiceAbstract
{
    public function execute(Request $request, Post $post): void
    {
        $productstagsInput = $request->input('stag');

        if (! $productstagsInput) {
            $productstagsInput = [];
        } else {
            $productstagsInput = collect(json_decode($productstagsInput, true))->pluck('value')->all();
        }

        $productstags = $post->productstags->pluck('name')->all();

        if (count($productstags) != count($productstagsInput) || count(array_diff($productstags, $productstagsInput)) > 0) {
            $post->productstags()->detach();
            foreach ($productstagsInput as $tagName) {
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
                    $post->productstags()->attach($stag->id);
                }
            }
        }
    }
}
