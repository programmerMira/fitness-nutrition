<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class article extends Controller
{
    function index(Request $request, $id)
    {
        dd($id);
        return view('article')->with($id);
    }
}
