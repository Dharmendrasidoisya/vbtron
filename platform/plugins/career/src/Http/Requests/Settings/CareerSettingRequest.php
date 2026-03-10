<?php

namespace Botble\Career\Http\Requests\Settings;

use Botble\Base\Rules\OnOffRule;
use Botble\Support\Http\Requests\Request;

class CareerSettingRequest extends Request
{
    public function rules(): array
    {
        return [
            'enable_Career_schema' => new OnOffRule(),
        ];
    }
}
