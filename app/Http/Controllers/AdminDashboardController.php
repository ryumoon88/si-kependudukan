<?php

namespace App\Http\Controllers;

use App\DataTables\CitizensDataTable;
use App\Models\Citizen;
use App\Models\Visitor;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $visitorsTillLastYear = Visitor::whereBetween('date', [date_sub(now(), date_interval_create_from_date_string('2 years')), now()])->get();
        $yearSeparated = $visitorsTillLastYear->groupBy(function ($item) {
            return $item->date->year;
        });
        $lastYearVisitors = $yearSeparated[intval(now()->format('Y')) - 1];
        $thisYearVisitors = $yearSeparated[intval(now()->format('Y'))];
        $thisYearVisitorsCount = $thisYearVisitors->count();
        $yearlyVisitorPercentage = round((($thisYearVisitorsCount - $lastYearVisitors->count()) / $lastYearVisitors->count()) * 100, 2);

        $lastMonthVisitors = $thisYearVisitors->where(function ($item) {
            return date('Y-m', $item->date->timestamp) == date('Y-m', date_sub(now(), date_interval_create_from_date_string('1 month'))->getTimestamp());
        });
        $thisMonthVisitors = $thisYearVisitors->where(function ($item) {
            return date('Y-m', $item->date->timestamp) == now()->format('Y-m');
        });
        $thisMonthVisitorsCount = $thisMonthVisitors->count();
        $monthlyVisitorPercentage = round((($thisMonthVisitorsCount - $lastMonthVisitors->count()) / $lastMonthVisitors->count() * 100), 2);

        $lastDayVisitors = $thisYearVisitors->where(function ($item) {
            return date('Y-m-d', $item->date->timestamp) == date('Y-m-d', date_sub(now(), date_interval_create_from_date_string('1 day'))->getTimestamp());
        });
        $thisDayVisitors = $thisYearVisitors->where(function ($item) {
            return date('Y-m-d', $item->date->timestamp) == now()->format('Y-m-d');
        });
        $thisDayVisitorsCount = $thisDayVisitors->count();
        $dailyVisitorPercentage = round((($thisDayVisitorsCount - $lastDayVisitors->count()) / ($lastDayVisitors->count() == 0 ? 1 : $lastDayVisitors->count()) * 100), 2);

        return view('admins.index', compact('thisYearVisitorsCount', 'thisMonthVisitorsCount', 'thisDayVisitorsCount', 'yearlyVisitorPercentage', 'monthlyVisitorPercentage', 'dailyVisitorPercentage'));
    }

    public function citizens(CitizensDataTable $dataTable)
    {
        return $dataTable->render('admins.citizens.index', ['sided' => false]);
    }

    public function citizens_show(Citizen $citizen)
    {
        $sided = false;
        return view('admins.citizens.show', compact('citizen', 'sided'));
    }

    public function citizens_create()
    {
        $sided = false;
        return view('admins.citizens.new');
    }

    public function submissions()
    {
        $sided = false;
        return view('admins.submissions.index', compact('sided'));
    }
}