<?php

namespace Botble\Career\Tables;

use Botble\Career\Models\Career;
use Botble\Table\Abstracts\TableAbstract;
use Botble\Table\Actions\DeleteAction;
use Botble\Table\Actions\EditAction;
use Botble\Table\BulkActions\DeleteBulkAction;
use Botble\Table\BulkChanges\CreatedAtBulkChange;
use Botble\Table\BulkChanges\TextBulkChange;
use Botble\Table\Columns\CreatedAtColumn;
use Botble\Table\Columns\FormattedColumn;
use Botble\Table\Columns\IdColumn;
use Botble\Table\Columns\LinkableColumn;
use Botble\Table\Columns\StatusColumn;
use Botble\Table\HeaderActions\CreateHeaderAction;
use Illuminate\Database\Eloquent\Builder;

class CareerTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(Career::class)
            ->addColumns([
                IdColumn::make(),

                LinkableColumn::make('name')
                    ->title('Name')
                    ->route('career.edit')
                    ->alignStart(),

                FormattedColumn::make('company')
                    ->title('Company')
                    ->alignStart(),

                FormattedColumn::make('qualification')
                    ->title('Qualification')
                    ->alignStart(),

                FormattedColumn::make('experience')
                    ->title('Experience')
                    ->alignStart(),

                FormattedColumn::make('location')
                    ->title('Location')
                    ->alignStart(),

                // FormattedColumn::make('category_id')
                //     ->title(trans('plugins/career::career.category'))
                //     ->alignStart()
                //     ->getValueUsing(fn(FormattedColumn $column) => $column->getItem()->category->name ?? ''),

                CreatedAtColumn::make(),
                StatusColumn::make(),
            ])
            ->addHeaderAction(CreateHeaderAction::make()->route('career.create'))
            ->addActions([
                EditAction::make()->route('career.edit'),
                DeleteAction::make()->route('career.destroy'),
            ])
            ->addBulkAction(DeleteBulkAction::make()->permission('career.destroy'))
            ->addBulkChanges([
                TextBulkChange::make()
                    ->name('name')
                    ->title('Name'),

                TextBulkChange::make()
                    ->name('company')
                    ->title('Company'),

                TextBulkChange::make()
                    ->name('qualification')
                    ->title('Qualification'),

                TextBulkChange::make()
                    ->name('experience')
                    ->title('Experience'),

                TextBulkChange::make()
                    ->name('location')
                    ->title('Location'),

                CreatedAtBulkChange::make(),
            ])
            ->queryUsing(function (Builder $query) {
                return $query->select([
                    'id',
                    'name',
                    'company',
                    'qualification',
                    'experience',
                    'location',
                    'question',
                    'created_at',
                    'answer',
                    'category_id',
                    'status',
                ]);
            });
    }
}
