<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    

    public function loginStaff(Request $request)
    {
         $credentials = $request->only('email', 'password');

    if (auth()->guard('staff')->attempt($credentials)) {
        return redirect()->route('staff.dashboard');
    }

    return redirect()->route('staff.login')
        ->with('error', 'Invalid email or spassword');
    }



}
