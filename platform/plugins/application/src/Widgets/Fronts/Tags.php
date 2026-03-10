<?php

namespace Botble\Application\Widgets\Fronts;

use Botble\Base\Forms\FieldOptions\NameFieldOption;
use Botble\Base\Forms\FieldOptions\NumberFieldOption;
use Botble\Base\Forms\Fields\NumberField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Widget\AbstractWidget;
use Botble\Widget\Forms\WidgetForm;
use Illuminate\Support\Collection;

class Tags extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('tags'),
            'description' => __('Popular applicationtags'),
            'number_display' => 5,
        ]);
    }

    protected function data(): array|Collection
    {
        if (! is_plugin_active('application')) {
            return [];
        }

        return [
            'applicationtags' => get_popular_applicationtags((int)$this->getConfig('number_display')),
        ];
    }

    protected function settingForm(): WidgetForm|string|null
    {
        return WidgetForm::createFromArray($this->getConfig())
            ->add('name', TextField::class, NameFieldOption::make()->toArray())
            ->add(
                'number_display',
                NumberField::class,
                NumberFieldOption::make()
                    ->label(__('Number applicationtags to display'))
                    ->toArray()
            );
    }
}
