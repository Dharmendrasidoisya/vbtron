<?php

namespace Botble\Products\Forms\Settings;

use Botble\Products\Http\Requests\Settings\ProductsSettingRequest;
use Botble\Setting\Forms\SettingForm;

class ProductsSettingForm extends SettingForm
{
    public function setup(): void
    {
        parent::setup();

        $this
            ->setSectionTitle(trans('plugins/products::base.settings.title'))
            ->setSectionDescription(trans('plugins/products::base.settings.description'))
            ->setSectionDescription(trans('plugins/products::base.settings.shortdescription'))
            ->setValidatorClass(ProductsSettingRequest::class)
            ->add('products_setting', 'html', [
                'html' => view('plugins/products::partials.products-post-schema-fields'),
                'wrapper' => [
                    'class' => 'mb-0',
                ],
            ]);
    }
}
