<?php

namespace Botble\Career\Forms;

use Botble\Base\Forms\FieldOptions\DescriptionFieldOption;
use Botble\Base\Forms\FieldOptions\NameFieldOption;
use Botble\Base\Forms\FieldOptions\SortOrderFieldOption;
use Botble\Base\Forms\FieldOptions\StatusFieldOption;
use Botble\Base\Forms\Fields\NumberField;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\TextareaField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\FormAbstract;
use Botble\Career\Http\Requests\CareerCategoryRequest;
use Botble\Career\Models\CareerCategory;

class CareerCategoryForm extends FormAbstract
{
    public function setup(): void
    {
        $this
            ->model(CareerCategory::class)
            ->setValidatorClass(CareerCategoryRequest::class)
            ->add('name', TextField::class, NameFieldOption::make()->required()->toArray())
            ->add('description', TextareaField::class, DescriptionFieldOption::make()->toArray())
            ->add('order', NumberField::class, SortOrderFieldOption::make()->toArray())
            ->add('status', SelectField::class, StatusFieldOption::make()->toArray())
            ->setBreakFieldPoint('status');
    }
}
