<?php

namespace Botble\Products\Http\Resources;
use Botble\Media\Facades\RvMedia;
use Botble\Products\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Category
 */
class ListCategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            
            'slug' => $this->slug,
            'description' => $this->description,
            'shortdescription' => $this->shortdescription,
            'image' => $this->image ? RvMedia::url($this->image) : null,
            'children' => CategoryResource::collection($this->children),
            'parent' => new CategoryResource($this->parent),
        ];
    }
}
