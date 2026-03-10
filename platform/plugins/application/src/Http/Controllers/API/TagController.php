<?php

namespace Botble\Application\Http\Controllers\API;

use Botble\Base\Http\Controllers\BaseController;
use Botble\Application\Http\Resources\TagResource;
use Botble\Application\Models\Tag;
use Illuminate\Http\Request;

class TagController extends BaseController
{
    /**
     * List applicationtags
     *
     * @group Application
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
