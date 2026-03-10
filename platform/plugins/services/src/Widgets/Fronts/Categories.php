<?php

namespace Botble\Services\Widgets\Fronts;

use Botble\Base\Forms\FieldOptions\NameFieldOption;
use Botble\Base\Forms\FieldOptions\NumberFieldOption;
use Botble\Base\Forms\Fields\NumberField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Services\Models\Category;
use Botble\Widget\AbstractWidget;
use Botble\Widget\Forms\WidgetForm;
use Illuminate\Support\Collection;

class servicescategories extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('Services servicescategories'),
            'description' => __('Widget display services servicescategories'),
            'shortdescription' => __('Widget display services servicescategories'),
            'number_display' => 10,
        ]);
    }

    protected function data(): array|Collection
    {
        if (! is_plugin_active('services')) {
            return [];
        }

        $servicescategories = Category::query()
            ->wherePublished()
            ->with('slugable')
            ->take((int)$this->getConfig('number_display') ?: 10)
            ->get();

        return [
            'servicescategories' => $servicescategories,
        ];
    }

    protected function settingForm(): WidgetForm|string|null
    {
        if (! is_plugin_active('services')) {
            return null;
        }

        return WidgetForm::createFromArray($this->getConfig())
            ->add('name', TextField::class, NameFieldOption::make()->toArray())
            ->add(
                'number_display',
                NumberField::class,
                NumberFieldOption::make()
                    ->label(__('Number servicescategories to display'))
                    ->toArray()
            );
    }
}
