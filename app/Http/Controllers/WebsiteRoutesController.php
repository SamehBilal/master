<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteRoutesController extends Controller
{
    public function index()
    {
        return view('website.index');
    }
}
