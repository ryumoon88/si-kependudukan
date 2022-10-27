<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admins.index');
    }

    public function citizens()
    {
        return view('admins.citizens.index');
    }
}
