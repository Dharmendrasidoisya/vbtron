<?php

namespace Botble\Products\Products\Abstracts;

use Botble\Products\Models\Post;
use Illuminate\Http\Request;

abstract class StoretagserviceAbstract
{
    abstract public function execute(Request $request, Post $post): void;
}
