<?php

namespace Botble\RealEstate\Tables;

use Botble\Base\Facades\BaseHelper;
use Botble\Base\Facades\Html;
use Botble\RealEstate\Models\CustomField;
use Botble\Table\Abstracts\TableAbstract;
use Botble\Table\Actions\DeleteAction;
use Botble\Table\Actions\EditAction;
use Botble\Table\BulkActions\DeleteBulkAction;
use Botble\Table\Columns\CreatedAtColumn;
use Botble\Table\Columns\IdColumn;
use Botble\Table\Columns\NameColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Http\JsonResponse;

class CustomFieldTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(CustomField::class)
            ->addActions([
                EditAction::make()->route('real-estate.custom-fields.edit'),
                DeleteAction::make()->route('real-estate.custom-fields.destroy'),
            ]);
    }

    public function query(): Relation|Builder|QueryBuilder
    {
        $query = $this
            ->getModel()
            ->query()
            ->select([
                'id',
                'name',
                'created_at',
            ]);

        return $this->applyScopes($query);
    }

    public function ajax(): JsonResponse
    {
        $data = $this->table
            ->eloquent($this->query())
            ->editColumn('name', function (CustomField $item) {
                if (! $this->hasPermission('real-estate.custom-fields.edit')) {
                    return BaseHelper::clean($item->name);
                }

                return Html::link(route('real-estate.custom-fields.edit', $item->id), BaseHelper::clean($item->name));
            });

        return $this->toJson($data);
    }

    public function columns(): array
    {
        return [
            IdColumn::make(),
            NameColumn::make(),
            CreatedAtColumn::make(),
        ];
    }

    public function buttons(): array
    {
        return $this->addCreateButton(route('real-estate.custom-fields.create'), 'real-estate.custom-fields.create');
    }

    public function bulkActions(): array
    {
        return [
            DeleteBulkAction::make()->permission('real-estate.custom-fields.destroy'),
        ];
    }

    public function getBulkChanges(): array
    {
        return [
            'name' => [
                'title' => trans('core/base::tables.name'),
                'type' => 'text',
                'validate' => 'required|max:120',
            ],
            'created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'type' => 'datePicker',
            ],
        ];
    }
}
