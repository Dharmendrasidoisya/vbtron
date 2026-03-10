<?php

namespace Botble\Career\Http\Requests;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class CareerRequest extends Request
{
    public function rules(): array
    {
        return [
            // 'category_id' => ['required', 'exists:career_categories,id'],
            // 'question' => ['required', 'string'],
            // 'answer' => ['required', 'string'],
            'status' => ['required', Rule::in(BaseStatusEnum::values())],
        ];
    }
}
