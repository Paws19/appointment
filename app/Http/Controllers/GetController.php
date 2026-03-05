<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\AccountModel;

class GetController extends Controller
{
    //Landing page
    public function index()
    {
        return view('index');
    }

    // admin page
    public function loginAdmin()
    {
        return view('admin.login');
    }

    public function dashboardAdmin()
    {
        $accounts = AccountModel::all();


        return view('admin.dashboard', compact('accounts'));
    }
}
