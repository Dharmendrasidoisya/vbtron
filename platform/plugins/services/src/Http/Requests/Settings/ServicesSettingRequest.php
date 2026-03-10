<?php

namespace Botble\Services\Http\Requests\Settings;

use Botble\Base\Rules\OnOffRule;
use Botble\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class ServicesSettingRequest extends Request
{
    public function rules(): array
    {
        return [
            'services_post_schema_enabled' => new OnOffRule(),
            'services_post_schema_type' => [
                'nullable',
                'string',
                Rule::in(['NewsArticle', 'News', 'Article', 'ServicesPosting']),
            ],
        ];
    }
}
