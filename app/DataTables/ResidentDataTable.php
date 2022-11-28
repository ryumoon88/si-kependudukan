<?php

namespace App\DataTables;

use App\Models\Resident;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\JsonEncodingException;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ResidentDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->addColumn('action', function ($data) {
                return '<div class="dropdown">
                <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Action
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="' . route('admin.dashboard.resident.identity.show', ['resident' => $data->ulid]) . '">Details</a></li>
                        <li><a class="dropdown-item" href="#">Edit</a></li>
                        <li><a class="dropdown-item" href="#">Delete</a></li>
                    </ul>
                </div>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Resident $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Resident $model): QueryBuilder
    {
        $model = $model->with('birth')->select('residents.*');
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('resident-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1, 'asc')
            ->selectInfo(false);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id_number')->addClass('fw-bold')->title('#')->width(10)->orderable(false),
            Column::make('birth.name')->title('Name'),
            Column::make('email'),
            Column::make('phone_number'),
            Column::make('action')->orderable(false)->searchable(false)->width(0)
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Resident_' . date('YmdHis');
    }
}