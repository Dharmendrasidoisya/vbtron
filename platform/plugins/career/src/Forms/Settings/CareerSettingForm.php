<?php

namespace Botble\Career\Forms\Settings;

use Botble\Career\Http\Requests\Settings\CareerSettingRequest;
use Botble\Setting\Forms\SettingForm;

class CareerSettingForm extends SettingForm
{
    public function setup(): void
    {
        parent::setup();

        $this
            ->setSectionTitle(trans('plugins/career::career.settings.title'))
            ->setSectionDescription(trans('plugins/career::career.settings.description'))
            ->setValidatorClass(CareerSettingRequest::class)
            ->add('enable_Career_schema', 'onOffCheckbox', [
                'label' => trans('plugins/career::career.settings.enable_Career_schema'),
                'value' => setting('enable_Career_schema', false),
                'wrapper' => [
                    'class' => 'mb-0',
                ],
                'help_block' => [
                    'text' => trans('plugins/career::career.settings.enable_Career_schema_description', [
                        'url' => sprintf('<a href="%s">%s</a>', $url = 'https://developers.google.com/search/docs/data-types/Careerpage', $url),
                    ]),
                ],
            ]);
    }
}
