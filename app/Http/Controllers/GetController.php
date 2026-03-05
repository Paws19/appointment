<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetController extends Controller
{
    //Landing page
    public function index()
    {
        return view('index');
    }
}
