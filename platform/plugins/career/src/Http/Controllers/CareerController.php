<?php

namespace Botble\Career\Http\Controllers;

use Botble\Base\Http\Actions\DeleteResourceAction;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Supports\Breadcrumb;
use Botble\Career\Forms\CareerForm;
use Botble\Career\Http\Requests\CareerRequest;
use Botble\Career\Models\Career;
use Botble\Career\Tables\CareerTable;

class CareerController extends BaseController
{
    protected function breadcrumb(): Breadcrumb
    {
        return parent::breadcrumb()
            ->add(trans('plugins/career::career.name'), route('career.index'));
    }

    public function index(CareerTable $table)
    {
        $this->pageTitle(trans('plugins/career::career.name'));

        return $table->renderTable();
    }
    public function details($id)
{
    $job = \DB::table('careers')
        ->where('id', $id)
        ->where('status', 'published')
        ->first();

    if (! $job) {
        abort(404);
    }

    \Theme::setTitle($job->name);

    return \Theme::scope('career-details', compact('job'), 'plugins/career::details')->render();
}

    //    public function details($id)
    //     {
    //         $job = \DB::table('careers')
    //             ->where('id', $id)
    //             ->where('status', 'published')
    //             ->first();

    //         if (! $job) {
    //             abort(404);
    //         }

    //         return view('plugins/career::details', compact('job'));
    //     }
    public function create()
    {
        $this->pageTitle(trans('plugins/career::career.create'));

        return CareerForm::create()->renderForm();
    }

    public function store(CareerRequest $request)
    {
        $form = CareerForm::create()->setRequest($request);
        $form->save();

        return $this
            ->httpResponse()
            ->setPreviousRoute('career.index')
            ->setNextRoute('career.edit', $form->getModel()->getKey())
            ->withCreatedSuccessMessage();
    }

    public function edit(Career $career)
    {
        $this->pageTitle(trans('core/base::forms.edit_item', ['name' => $career->question]));

        return CareerForm::createFromModel($career)->renderForm();
    }

    public function update(Career $career, CareerRequest $request)
    {
        CareerForm::createFromModel($career)->setRequest($request)->save();

        return $this
            ->httpResponse()
            ->setPreviousRoute('career.index')
            ->withUpdatedSuccessMessage();
    }

    public function destroy(Career $career)
    {
        return DeleteResourceAction::make($career);
    }
}
