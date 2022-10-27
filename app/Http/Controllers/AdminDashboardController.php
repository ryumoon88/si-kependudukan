<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $today_visitors_count = Visitor::where('date', DB::raw('CURDATE()'))->get()->count();
        $yesterday_visitors_count = Visitor::where('date', DB::raw('DATE_SUB(CURDATE(), INTERVAL 1 day)'))->count();
        $summary_visitors_count = (($today_visitors_count - $yesterday_visitors_count) / 100) * 100;
        return view('admins.index', compact('today_visitors_count', 'summary_visitors_count'));
    }

    public function citizens()
    {
        return view('admins.citizens.index');
    }
}
