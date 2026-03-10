<?php

namespace Botble\Career\Tables;

use Botble\Career\Models\CareerCategory;
use Botble\Table\Abstracts\TableAbstract;
use Botble\Table\Actions\DeleteAction;
use Botble\Table\Actions\EditAction;
use Botble\Table\BulkActions\DeleteBulkAction;
use Botble\Table\BulkChanges\CreatedAtBulkChange;
use Botble\Table\BulkChanges\NameBulkChange;
use Botble\Table\BulkChanges\StatusBulkChange;
use Botble\Table\Columns\CreatedAtColumn;
use Botble\Table\Columns\IdColumn;
use Botble\Table\Columns\NameColumn;
use Botble\Table\Columns\StatusColumn;
use Botble\Table\HeaderActions\CreateHeaderAction;
use Illuminate\Database\Eloquent\Builder;

class CareerCategoryTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(CareerCategory::class)
            ->addColumns([
                IdColumn::make(),
                NameColumn::make()->route('career_category.edit'),
                CreatedAtColumn::make(),
                StatusColumn::make(),
            ])
            ->addHeaderAction(CreateHeaderAction::make()->route('career_category.create'))
            ->addActions([
                EditAction::make()->route('career_category.edit'),
                DeleteAction::make()->route('career_category.destroy'),
            ])
            ->addBulkAction(DeleteBulkAction::make()->permission('career_category.destroy'))
            ->addBulkChanges([
                NameBulkChange::make(),
                StatusBulkChange::make(),
                CreatedAtBulkChange::make(),
            ])
            ->queryUsing(function (Builder $query) {
                return $query
                    ->select([
                        'id',
                        'name',
                        'created_at',
                        'status',
                    ]);
            });
    }
}
