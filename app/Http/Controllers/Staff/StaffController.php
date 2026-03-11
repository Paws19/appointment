<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User\UserBookAppointmentModel as Appointment;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentConfirmedEmail;
use App\Mail\CancellAppointment;

class StaffController extends Controller
{
    

    public function loginStaff(Request $request)
    {
         $credentials = $request->only('email', 'password');

    if (auth()->guard('staff')->attempt($credentials)) {
        return redirect()->route('staff.dashboard');
    }


    return redirect()->route('staff.login')
        ->with('error', 'Invalid email or password');
    }

    //update the status to confirmed
    public function updateStatusConfirmed($id)
{
    $appointment = Appointment::findOrFail($id);

    // Update status
    $appointment->update([
        'status' => 'confirmed'
    ]);

    // Retrieve appointment info
    $userEmail = $appointment->email;
    $userName = $appointment->parent_name;
    $office = $appointment->office; // cashier, registrar, admission etc

    // Send email
    Mail::to($userEmail)->send(
        new AppointmentConfirmedEmail($appointment)
    );

    return response()->json([
        'success' => true,
        'status' => 'confirmed'
    ]);
}

    //update the status to cancelled
    public function updateStatusCancelled($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['status' => 'cancelled']);
  // Send email
    Mail::to($appointment->email)->send(
        new CancellAppointment($appointment)
    );
        return response()->json([
            'success' => true,
            'status' => 'cancelled'
        ]);
    }

     //update the status to done
     public function updateStatusDone($id)
     {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['status' => 'done']);

        return response()->json([
            'success' => true,
            'status' => 'done'
        ]);
     }

     //delete the appointment
     public function deleteAppointment($id)
     {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return redirect()->back()->with('success', 'Appointment deleted successfully.');
     }

     public function logoutStaff()
     {
        auth()->guard('staff')->logout();
        return redirect()->route('staff.login');
     }

}
