<?php

namespace Botble\Services\Http\Controllers\Settings;

use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Services\Forms\Settings\ServicesSettingForm;
use Botble\Services\Http\Requests\Settings\ServicesSettingRequest;
use Botble\Setting\Http\Controllers\SettingController;

class ServicesSettingController extends SettingController
{
    public function edit()
    {
        $this->pageTitle(trans('plugins/services::base.settings.title'));

        return ServicesSettingForm::create()->renderForm();
    }

    public function update(ServicesSettingRequest $request): BaseHttpResponse
    {
        return $this->performUpdate($request->validated());
    }
}
