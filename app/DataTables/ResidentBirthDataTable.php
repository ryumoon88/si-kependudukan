<?php

namespace App\DataTables;

use App\Models\ResidentBirth;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ResidentBirthDataTable extends DataTable
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
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<div class="dropdown">
                            <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="' . route('admin.dashboard.resident.birth.show', ['resident_birth' => $data->ulid]) . '">Details</a></li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                <li><a class="dropdown-item" href="#">Delete</a></li>
                            </ul>
                        </div>';
            })
            ->filterColumn('birth_date', function ($query, $keyword) {
                $query->whereRaw('DATE_FORMAT(birth_date, "%d %b %Y") LIKE ? OR birth_date LIKE ?', ["%{$keyword}%", "%{$keyword}%"]);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ResidentBirth $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ResidentBirth $model): QueryBuilder
    {
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
            ->setTableId('residentbirth-table')
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
            Column::make('id')->addClass('fw-bold')->width(0)->orderable(false)->title('#'),
            // Column::make('DT_RowIndex')->title('#')->addClass('fw-bold')->orderable(false)->width(0),
            Column::make('name')->width(250),
            Column::make('birth_date'),
            Column::make('gender'),
            Column::make('action')->width(0)->orderable(false)->searchable(false)
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'ResidentBirth_' . date('YmdHis');
    }
}