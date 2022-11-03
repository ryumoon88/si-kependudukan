<?php

namespace App\DataTables;

use App\Models\Citizen;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CitizensDataTable extends DataTable
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
            ->addColumn('name', function ($data) {
                return $data->first_name . ' ' . $data->last_name;
            }, true)
            ->addColumn('user', function ($data) {
                return isset($data->user) ? $data->user->toArray() : ['phone_number' => '-'];
            })
            ->addColumn('action', function ($data) {

                return '<a class="btn btn-primary btn-sm" href="' . route('admin.dashboard.citizen.show', $data?->id_number, false) . '">Details</a>';
            })
            ->addColumn('status', function ($data) {
                $user = $data->user;
                $registered = $user != null;
                return '<span class="badge rounded-pill text-bg-' . ($registered ? 'success' : 'warning') . '">' . ($registered ? 'Registered' : 'Unregistered') . '</span>';
            })
            ->rawColumns(['status', 'action'])
            ->orderColumn('users.phone_number', function ($query, $order) {
                $query->orderByRaw("(IF(users.citizen_id IS NULL, '-', users.phone_number)) $order");
            })
            ->orderColumn('name', 'CONCAT(first_name, " ", last_name) $1')
            ->orderColumn('status', '(SELECT id FROM users WHERE id = citizens.id) $1')
            ->filterColumn('name', function ($query, $keyword) {
                $query->whereRaw("CONCAT(first_name,' ',last_name) LIKE ?", ["%{$keyword}%"]);
            })
            ->filterColumn('user.phone_number', function ($query, $keyword) {
                $sql = "(SELECT phone_number FROM users WHERE citizen_id = citizens.id) LIKE ?";
                $query->with('user')->whereRaw($sql, ["%{$keyword}%"]);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Citizen $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Citizen $model): QueryBuilder
    {
        $model = $model->withExists('user');
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
            ->setTableId('citizens-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0, 'asc')->selectInfo(false)
            ->selectStyleSingle();
        // ->buttons([
        //     Button::make('excel'),
        //     Button::make('csv'),
        //     Button::make('pdf'),
        //     Button::make('print'),
        //     Button::make('reset'),
        //     Button::make('reload')
        // ]);
    }

    public function getButtons(): array
    {
        return [
            Button::make()->text('New')->className('btn-sm btn-primary')->attr(['href' => route('admin.dashboard.citizen')])->tag('a')
        ];
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id_number')->className('fw-bold')->orderable(false)->title('#'),
            Column::make('name'),
            Column::make('address'),
            Column::make('user.phone_number'),
            Column::make('status'),
            Column::make('action')->orderable(false)
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Citizens_' . date('YmdHis');
    }
}