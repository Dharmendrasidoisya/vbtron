<?php

namespace Botble\Career\Forms;

use Botble\Base\Forms\FieldOptions\EditorFieldOption;
use Botble\Base\Forms\FieldOptions\SelectFieldOption;
use Botble\Base\Forms\FieldOptions\StatusFieldOption;
use Botble\Base\Forms\FieldOptions\TextareaFieldOption;
use Botble\Base\Forms\Fields\EditorField;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\TextareaField;
use Botble\Base\Forms\FormAbstract;
use Botble\Career\Http\Requests\CareerRequest;
use Botble\Career\Models\Career;
use Botble\Career\Models\CareerCategory;
use Botble\Base\Forms\FieldOptions\NameFieldOption;
use Botble\Base\Forms\Fields\TextField;

class CareerForm extends FormAbstract
{
    public function setup(): void
    {
        $CareerCategories = CareerCategory::query()
            ->pluck(
                'name',
                'id'
            )
            ->all();

        $this
            ->model(Career::class)
            ->setValidatorClass(CareerRequest::class)
            // ->add('name', TextField::class, NameFieldOption::make()->required()->toArray())
            // ->add('company', TextField::class, NameFieldOption::make()->required()->toArray())
            // ->add('qualification', TextField::class, NameFieldOption::make()->required()->toArray())
            // ->add('experience', TextField::class, NameFieldOption::make()->required()->toArray())
            // ->add('location', TextField::class, NameFieldOption::make()->required()->toArray())


            ->add('name', TextField::class, array_merge(
    NameFieldOption::make()->required()->toArray(),
    [
        'attr' => [
            'placeholder' => 'Name',
        ],
    ]
))

->add('company', TextField::class, array_merge(
    NameFieldOption::make()->required()->toArray(),
    [
        'attr' => [
            'placeholder' => 'Company',
        ],
    ]
))

->add('qualification', TextField::class, array_merge(
    NameFieldOption::make()->required()->toArray(),
    [
        'attr' => [
            'placeholder' => 'Qualification',
        ],
    ]
))

->add('experience', TextField::class, array_merge(
    NameFieldOption::make()->required()->toArray(),
    [
        'attr' => [
            'placeholder' => 'Experience',
        ],
    ]
))

->add('location', TextField::class, array_merge(
    NameFieldOption::make()->required()->toArray(),
    [
        'attr' => [
            'placeholder' => 'Location',
        ],
    ]
))
            // ->add(
            //     'category_id',
            //     SelectField::class,
            //     SelectFieldOption::make()
            //         ->label(trans('plugins/career::career.category'))
            //         ->choices(['' => trans('plugins/career::career.select_category')] + $CareerCategories)
            //         ->required()
            //         ->toArray()
            // )
            // ->add(
            //     'question',
            //     TextareaField::class,
            //     TextareaFieldOption::make()
            //         ->label(trans('plugins/career::career.question'))
            //         ->required()
            //         ->rows(4)
            //         ->toArray()
            // )
            // ->add(
            //     'answer',
            //     EditorField::class,
            //     EditorFieldOption::make()->label(trans('plugins/career::career.answer'))->required()->rows(4)->toArray()
            // )
            ->add('status', SelectField::class, StatusFieldOption::make()->toArray())
            ->setBreakFieldPoint('status');
    }
}
