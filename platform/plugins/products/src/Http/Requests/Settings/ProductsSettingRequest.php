<?php

namespace Botble\Products\Http\Requests\Settings;

use Botble\Base\Rules\OnOffRule;
use Botble\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class ProductsSettingRequest extends Request
{
    public function rules(): array
    {
        return [
            'products_post_schema_enabled' => new OnOffRule(),
            'products_post_schema_type' => [
                'nullable',
                'string',
                Rule::in(['NewsArticle', 'News', 'Article', 'ProductsPosting']),
            ],
        ];
    }
}
