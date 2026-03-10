<?php

namespace Botble\Products\Http\Controllers\API;

use Botble\Base\Http\Controllers\BaseController;
use Botble\Products\Http\Resources\TagResource;
use Botble\Products\Models\Tag;
use Illuminate\Http\Request;

class TagController extends BaseController
{
    /**
     * List productstags
     *
     * @group Products
     */
    public function index(Request $request)
    {
        $data = Tag::query()
            ->wherePublished()
            ->with('slugable')
            ->paginate($request->integer('per_page', 10) ?: 10);

        return $this
            ->httpResponse()
            ->setData(TagResource::collection($data))
            ->toApiResponse();
    }
}
