<?php

namespace App\Http\Controllers;

use App\Option;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $app_option = Option::find(1);
        return view('FrontViews.index', compact('app_option'));
    }
}
