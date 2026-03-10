<?php

namespace Botble\Services\Services\Abstracts;

use Botble\Services\Models\Post;
use Illuminate\Http\Request;

abstract class StoretagserviceAbstract
{
    abstract public function execute(Request $request, Post $post): void;
}
