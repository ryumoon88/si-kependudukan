<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index()
    {
        return view('admins.submissions.index');
    }
}