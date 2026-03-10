<?php

namespace Botble\Products\Http\Requests;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Rules\OnOffRule;
use Botble\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;
use Botble\Base\Rules\MediaImageRule;
class CategoryRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'description' => ['nullable', 'string'],
            'shortdescription' => ['nullable', 'string', 'max:400'],
            'status' => [Rule::in(BaseStatusEnum::values())],
            'is_default' => [new OnOffRule()],
            'is_featured' => [new OnOffRule()],
             'image' => ['nullable', 'string', new MediaImageRule()],
        ];
    }
}
