<?php

namespace Botble\Products\Widgets\Fronts;

use Botble\Base\Forms\FieldOptions\NameFieldOption;
use Botble\Base\Forms\FieldOptions\NumberFieldOption;
use Botble\Base\Forms\Fields\NumberField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Products\Models\Post;
use Botble\Widget\AbstractWidget;
use Botble\Widget\Forms\WidgetForm;
use Illuminate\Support\Collection;

class Recentproductsposts extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('Recent productsposts'),
            'description' => __('Recent productsposts widget.'),
            'number_display' => 5,
        ]);
    }

    protected function data(): array|Collection
    {
        if (! is_plugin_active('products')) {
            return ['productsposts' => []];
        }

        $productsposts = Post::query()
            ->wherePublished()
            ->limit((int)$this->getConfig('number_display'))
            ->with('slugable')
            ->select('*')
            ->orderByDesc('created_at')
            ->get();

        return compact('productsposts');
    }

    protected function settingForm(): WidgetForm|string|null
    {
        if (! is_plugin_active('products')) {
            return null;
        }

        return WidgetForm::createFromArray($this->getConfig())
            ->add('name', TextField::class, NameFieldOption::make()->toArray())
            ->add(
                'number_display',
                NumberField::class,
                NumberFieldOption::make()
                    ->label(__('Number productsposts to display'))
                    ->toArray()
            );
    }
}
