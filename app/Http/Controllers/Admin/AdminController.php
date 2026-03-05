<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\AccountModel;

class AdminController extends Controller
{
    //get admin login credentials
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (auth()->guard('admin')->attempt($credentials)) {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('admin.login')
        ->with('error', 'Invalid email or password');
}

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login');
    }



}
