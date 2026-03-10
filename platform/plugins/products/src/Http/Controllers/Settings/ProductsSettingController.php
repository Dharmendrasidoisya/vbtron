<?php

namespace Botble\Products\Http\Controllers\Settings;

use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Products\Forms\Settings\ProductsSettingForm;
use Botble\Products\Http\Requests\Settings\ProductsSettingRequest;
use Botble\Setting\Http\Controllers\SettingController;

class ProductsSettingController extends SettingController
{
    public function edit()
    {
        $this->pageTitle(trans('plugins/products::base.settings.title'));

        return ProductsSettingForm::create()->renderForm();
    }

    public function update(ProductsSettingRequest $request): BaseHttpResponse
    {
        return $this->performUpdate($request->validated());
    }
}
