<?php

namespace Botble\Application\Application\Abstracts;

use Botble\Application\Models\Post;
use Illuminate\Http\Request;

abstract class StoretagserviceAbstract
{
    abstract public function execute(Request $request, Post $post): void;
}
