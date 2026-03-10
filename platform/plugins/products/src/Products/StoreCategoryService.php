<?php

namespace Botble\Products\Products;

use Botble\Products\Models\Post;
use Botble\Products\Products\Abstracts\StoreCategoryServiceAbstract;
use Illuminate\Http\Request;

class StoreCategoryService extends StoreCategoryServiceAbstract
{
    public function execute(Request $request, Post $post): void
    {
        $post->productscategories()->sync($request->input('productscategories', []));
    }
}
