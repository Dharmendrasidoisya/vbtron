<?php

namespace Botble\Products\Http\Resources;
use Botble\Media\Facades\RvMedia;
use Botble\Products\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Category
 */
class CategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
         'image' => $this->image ? RvMedia::url($this->image) : null,
            'name' => $this->name,
            'slug' => $this->slug,
            'url' => $this->url,
            'description' => $this->description,
            'shortdescription' => $this->shortdescription,
        ];
    }
}
