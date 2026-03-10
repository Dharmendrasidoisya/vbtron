<?php

namespace Botble\Application\Application;

use Botble\Application\Models\Post;
use Botble\Application\Application\Abstracts\StoreCategoryServiceAbstract;
use Illuminate\Http\Request;

class StoreCategoryService extends StoreCategoryServiceAbstract
{
    public function execute(Request $request, Post $post): void
    {
        $post->applicationcategories()->sync($request->input('applicationcategories', []));
    }
}
