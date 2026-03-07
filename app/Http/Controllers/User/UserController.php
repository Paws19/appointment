<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\UserBookAppointmentModel as BookAppointmentUser;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mail\SubmittedMail as AppointmentBookedMail;

class UserController extends Controller
{
        
  public function bookAppointment(Request $request)
{
    $request->validate([
        'parent_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'appointment_date' => 'required|date',
        'appointment_time' => 'required|string|max:255',
        'purpose' => 'required|string|max:255',
        'additional_note' => 'nullable|string|max:255',
        'role' => 'required|in:registrar,cashier,guidance,elem,sr',
    ]);

    // Prevent duplicate appointment
    $existing = BookAppointmentUser::where('email', $request->email)
        ->where('appointment_date', $request->appointment_date)
        ->where('appointment_time', $request->appointment_time)
        ->first();

    if ($existing) {
        return back()->with('error', 'You already booked an appointment for this schedule.');
    }

    $existingEmail = BookAppointmentUser::where('email', $request->email)->first();

    if ($existingEmail) {
        return back()->with('error', 'You already have an appointment with this email.');
    }

    $appointment = BookAppointmentUser::create([
        'reference_number' => 'REF-' . strtoupper(uniqid()),
        'parent_name' => $request->parent_name,
        'email' => $request->email,
        'appointment_date' => $request->appointment_date,
        'appointment_time' => $request->appointment_time,
        'purpose' => $request->purpose,
        'additional_note' => $request->additional_note,
        'role' => $request->role,
    ]);

    Mail::to($request->email)->send(new AppointmentBookedMail($appointment));

    return back()->with('success', 'Your appointment has been booked successfully!');
}
                


}
