<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\AccountModel;
use App\Models\Staff\StaffModel;
use Illuminate\Container\Attributes\Auth;
use App\Models\User\UserBookAppointmentModel as BookAppointmentUser;

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
        $GetStaffAccounts = StaffModel::all();

        return view('admin.dashboard', compact('accounts', 'GetStaffAccounts'));
    }

    //staff login page
    public function loginStaff()
    {
        return view('staff.login');
    }

   public function dashboardStaff() {
    $staffAccounts = StaffModel::all();

    $GetRoleOffice = null;

    if (auth()->guard('staff')->check()) {
        $GetRoleOffice = auth()->guard('staff')->user()->role;
    }

    return view('staff.dashboard', compact('staffAccounts', 'GetRoleOffice'));
    }

    //Email
    public function emailSubmitted($id)
    {
        $bookAppointmentUser = BookAppointmentUser::findOrFail($id);

        return view('email.submitted', compact('bookAppointmentUser'));
    }


}
