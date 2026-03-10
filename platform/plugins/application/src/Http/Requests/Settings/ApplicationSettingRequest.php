<?php

namespace Botble\Application\Http\Requests\Settings;

use Botble\Base\Rules\OnOffRule;
use Botble\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class ApplicationSettingRequest extends Request
{
    public function rules(): array
    {
        return [
            'application_post_schema_enabled' => new OnOffRule(),
            'application_post_schema_type' => [
                'nullable',
                'string',
                Rule::in(['NewsArticle', 'News', 'Article', 'ApplicationPosting']),
            ],
        ];
    }
}
