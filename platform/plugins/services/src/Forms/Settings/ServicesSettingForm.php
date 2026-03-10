<?php

namespace Botble\Services\Forms\Settings;

use Botble\Services\Http\Requests\Settings\ServicesSettingRequest;
use Botble\Setting\Forms\SettingForm;

class ServicesSettingForm extends SettingForm
{
    public function setup(): void
    {
        parent::setup();

        $this
            ->setSectionTitle(trans('plugins/services::base.settings.title'))
            ->setSectionDescription(trans('plugins/services::base.settings.description'))
            ->setSectionDescription(trans('plugins/services::base.settings.shortdescription'))
            ->setValidatorClass(ServicesSettingRequest::class)
            ->add('services_setting', 'html', [
                'html' => view('plugins/services::partials.services-post-schema-fields'),
                'wrapper' => [
                    'class' => 'mb-0',
                ],
            ]);
    }
}
