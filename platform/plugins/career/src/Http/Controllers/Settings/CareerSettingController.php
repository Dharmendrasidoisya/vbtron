<?php

namespace Botble\Career\Http\Controllers\Settings;

use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Career\Forms\Settings\CareerSettingForm;
use Botble\Career\Http\Requests\Settings\CareerSettingRequest;
use Botble\Setting\Http\Controllers\SettingController;

class CareerSettingController extends SettingController
{
    public function edit()
    {
        $this->pageTitle(trans('plugins/career::career.settings.title'));

        return CareerSettingForm::create()->renderForm();
    }

    public function update(CareerSettingRequest $request): BaseHttpResponse
    {
        return $this->performUpdate($request->validated());
    }
}
