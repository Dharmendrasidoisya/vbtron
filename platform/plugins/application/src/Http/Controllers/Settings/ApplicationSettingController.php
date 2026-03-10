<?php

namespace Botble\Application\Http\Controllers\Settings;

use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Application\Forms\Settings\ApplicationSettingForm;
use Botble\Application\Http\Requests\Settings\ApplicationSettingRequest;
use Botble\Setting\Http\Controllers\SettingController;

class ApplicationSettingController extends SettingController
{
    public function edit()
    {
        $this->pageTitle(trans('plugins/application::base.settings.title'));

        return ApplicationSettingForm::create()->renderForm();
    }

    public function update(ApplicationSettingRequest $request): BaseHttpResponse
    {
        return $this->performUpdate($request->validated());
    }
}
