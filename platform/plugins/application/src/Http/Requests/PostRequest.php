<?php

namespace Botble\Application\Http\Requests;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Rules\MediaImageRule;
use Botble\Application\Supports\PostFormat;
use Botble\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class PostRequest extends Request
{
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:250',
            'description' => 'nullable|string|max:400',
            'content' => 'nullable|string|max:300000',
            'stag' => 'nullable|string|max:255',
            'applicationcategories' => 'sometimes|array',
            'applicationcategories.*' => 'sometimes|exists:applicationcategories,id',
            'status' => Rule::in(BaseStatusEnum::values()),
            'is_featured' => 'sometimes|boolean',
            'image' => ['nullable', 'string', new MediaImageRule()],
        ];

        $postFormats = PostFormat::getPostFormats(true);

        if (count($postFormats) > 1) {
            $rules['format_type'] = Rule::in(array_keys($postFormats));
        }

        return $rules;
    }
}
