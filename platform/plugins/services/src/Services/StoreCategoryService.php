<?php

namespace Botble\Services\Services;

use Botble\Services\Models\Post;
use Botble\Services\Services\Abstracts\StoreCategoryServiceAbstract;
use Illuminate\Http\Request;

class StoreCategoryService extends StoreCategoryServiceAbstract
{
    public function execute(Request $request, Post $post): void
    {
        $post->servicescategories()->sync($request->input('servicescategories', []));
    }
}
