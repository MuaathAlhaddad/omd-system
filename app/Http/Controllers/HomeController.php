<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    public function customers()
    {
        return view('layouts.vertical');
    }
    public function invoices()
    {
        return view('layouts.vertical');
    }
}
