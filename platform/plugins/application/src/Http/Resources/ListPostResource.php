<?php

namespace Botble\Application\Http\Resources;

use Botble\Application\Models\Post;
use Botble\Media\Facades\RvMedia;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Post
 */
class ListPostResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'image' => $this->image ? RvMedia::url($this->image) : null,
            'applicationcategories' => CategoryResource::collection($this->applicationcategories),
            'applicationtags' => TagResource::collection($this->applicationtags),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
