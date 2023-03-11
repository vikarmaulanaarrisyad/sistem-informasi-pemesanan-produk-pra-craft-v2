<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('dashboard');
        } else if (auth()->user()->hasRole('user')) {
            return view('welcome');
        }
    }
}
