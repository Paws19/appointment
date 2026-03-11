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

      //Get total confirmed appointments per office
$GetTotalCashier = BookAppointmentUser::where('role', 'cashier')
    ->where('status', 'confirmed')
    ->count();

$GetTotalRegistrar = BookAppointmentUser::where('role', 'registrar')
    ->where('status', 'confirmed')
    ->count();

$GetTotalAdmission = BookAppointmentUser::where('role', 'admission')
    ->where('status', 'confirmed')
    ->count();

$GetTotalGuidance = BookAppointmentUser::where('role', 'guidance')
    ->where('status', 'confirmed')
    ->count();

$GetTotalElem = BookAppointmentUser::where('role', 'elem')
    ->where('status', 'confirmed')
    ->count();

$GetTotalSr = BookAppointmentUser::where('role', 'sr')
    ->where('status', 'confirmed')
    ->count();

        //Get total pending appointments per office
$GetTotalCashierPending = BookAppointmentUser::where('role', 'cashier')
    ->where('status', 'pending')
    ->count();

$GetTotalRegistrarPending = BookAppointmentUser::where('role', 'registrar')
    ->where('status', 'pending')
    ->count();

$GetTotalAdmissionPending = BookAppointmentUser::where('role', 'admission')
    ->where('status', 'pending')
    ->count();

$GetTotalGuidancePending = BookAppointmentUser::where('role', 'guidance')
    ->where('status', 'pending')
    ->count();

$GetTotalElemPending = BookAppointmentUser::where('role', 'elem')
    ->where('status', 'pending')
    ->count();

$GetTotalSrPending = BookAppointmentUser::where('role', 'sr')
    ->where('status', 'pending')
    ->count();
        

    //Get all the appointment
    $GetAllBookAppointments = BookAppointmentUser::all();


        return view('admin.dashboard', compact('accounts', 'GetStaffAccounts', 'GetTotalCashier', 'GetTotalRegistrar', 'GetTotalAdmission', 'GetTotalGuidance', 'GetTotalElem', 'GetTotalSr', 'GetAllBookAppointments', 
        'GetTotalCashierPending','GetTotalRegistrarPending', 'GetTotalAdmissionPending' , 'GetTotalGuidancePending' , 'GetTotalElemPending' , 'GetTotalSrPending'));
    }

    //staff login page
    public function loginStaff()
    {
        return view('staff.login');
    }

   public function dashboardStaff()
{
    $staffAccounts = StaffModel::all();

    $GetRoleOffice = null;
    $GetUserBookAppointments = collect();

    $GetTotalStatusConfirmed = 0;
    $GetTotalStatusCancelled = 0;
    $GetTotalStatusDone = 0;
    $GetTotalStatusPending = 0;

    if (auth()->guard('staff')->check()) {

        $roleOffice = auth()->guard('staff')->user()->role;
        $GetRoleOffice = $roleOffice;

        // Appointments for this office
        $GetUserBookAppointments = BookAppointmentUser::where('role', $roleOffice)->get();

        // Get all status counts in ONE query
        $statusCounts = BookAppointmentUser::where('role', $roleOffice)
            ->selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        $GetTotalStatusConfirmed = $statusCounts['confirmed'] ?? 0;
        $GetTotalStatusCancelled = $statusCounts['cancelled'] ?? 0;
        $GetTotalStatusDone = $statusCounts['done'] ?? 0;
        $GetTotalStatusPending = $statusCounts['pending'] ?? 0;
    }

    return view('staff.dashboard', compact(
        'staffAccounts',
        'GetRoleOffice',
        'GetUserBookAppointments',
        'GetTotalStatusConfirmed',
        'GetTotalStatusCancelled',
        'GetTotalStatusDone',
        'GetTotalStatusPending'
    ));
}
    //Email
    public function emailSubmitted($id)
    {
        $bookAppointmentUser = BookAppointmentUser::findOrFail($id);

        return view('email.submitted', compact('bookAppointmentUser'));
    }


}
