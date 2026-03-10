<?php

namespace Botble\Application\Forms\Settings;

use Botble\Application\Http\Requests\Settings\ApplicationSettingRequest;
use Botble\Setting\Forms\SettingForm;

class ApplicationSettingForm extends SettingForm
{
    public function setup(): void
    {
        parent::setup();

        $this
            ->setSectionTitle(trans('plugins/application::base.settings.title'))
            ->setSectionDescription(trans('plugins/application::base.settings.description'))
            ->setSectionDescription(trans('plugins/application::base.settings.shortdescription'))
            ->setValidatorClass(ApplicationSettingRequest::class)
            ->add('application_setting', 'html', [
                'html' => view('plugins/application::partials.application-post-schema-fields'),
                'wrapper' => [
                    'class' => 'mb-0',
                ],
            ]);
    }
}
