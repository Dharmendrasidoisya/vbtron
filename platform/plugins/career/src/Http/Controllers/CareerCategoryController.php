<?php

namespace Botble\Career\Http\Controllers;

use Botble\Base\Http\Actions\DeleteResourceAction;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Supports\Breadcrumb;
use Botble\Career\Forms\CareerCategoryForm;
use Botble\Career\Http\Requests\CareerCategoryRequest;
use Botble\Career\Models\CareerCategory;
use Botble\Career\Tables\CareerCategoryTable;

class CareerCategoryController extends BaseController
{
    protected function breadcrumb(): Breadcrumb
    {
        return parent::breadcrumb()
            ->add(trans('plugins/career::career.name'))
            ->add(trans('plugins/career::career-category.name'), route('career_category.index'));
    }

    public function index(CareerCategoryTable $table)
    {
        $this->pageTitle(trans('plugins/career::career-category.name'));

        return $table->renderTable();
    }

    public function create()
    {
        $this->pageTitle(trans('plugins/career::career-category.create'));

        return CareerCategoryForm::create()->renderForm();
    }

    public function store(CareerCategoryRequest $request)
    {
        $form = CareerCategoryForm::create()->setRequest($request);
        $form->save();

        return $this
            ->httpResponse()
            ->setPreviousRoute('career_category.index')
            ->setNextRoute('career_category.edit', $form->getModel()->getKey())
            ->withCreatedSuccessMessage();
    }

    public function edit(CareerCategory $CareerCategory)
    {
        $this->pageTitle(trans('core/base::forms.edit_item', ['name' => $CareerCategory->name]));

        return CareerCategoryForm::createFromModel($CareerCategory)->renderForm();
    }

    public function update(CareerCategory $CareerCategory, CareerCategoryRequest $request)
    {
        CareerCategoryForm::createFromModel($CareerCategory)->setRequest($request)->save();

        return $this
            ->httpResponse()
            ->setPreviousRoute('career_category.index')
            ->withUpdatedSuccessMessage();
    }

    public function destroy(CareerCategory $CareerCategory)
    {
        return DeleteResourceAction::make($CareerCategory);
    }
}
