<?php

namespace Botble\RealEstate\Tables;

use Botble\Base\Facades\BaseHelper;
use Botble\Base\Facades\Html;
use Botble\RealEstate\Models\Feature;
use Botble\Table\Abstracts\TableAbstract;
use Botble\Table\Actions\DeleteAction;
use Botble\Table\Actions\EditAction;
use Botble\Table\BulkActions\DeleteBulkAction;
use Botble\Table\Columns\IdColumn;
use Botble\Table\Columns\NameColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Http\JsonResponse;

class FeatureTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(Feature::class)
            ->addActions([
                EditAction::make()->route('property_feature.edit'),
                DeleteAction::make()->route('property_feature.destroy'),
            ]);
    }

    public function ajax(): JsonResponse
    {
        $data = $this->table
            ->eloquent($this->query())
            ->editColumn('name', function (Feature $item) {
                return Html::link(route('property_feature.edit', $item->id), BaseHelper::clean($item->name));
            });

        return $this->toJson($data);
    }

    public function query(): Relation|Builder|QueryBuilder
    {
        $query = $this
            ->getModel()
            ->query()
            ->select([
            'id',
            'name',
        ]);

        return $this->applyScopes($query);
    }

    public function columns(): array
    {
        return [
            IdColumn::make(),
            NameColumn::make(),
        ];
    }

    public function buttons(): array
    {
        return $this->addCreateButton(route('property_feature.create'), 'property_feature.create');
    }

    public function bulkActions(): array
    {
        return [
            DeleteBulkAction::make()->permission('property_feature.destroy'),
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
        ];
    }
}
