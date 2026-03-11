<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\UserBookAppointmentModel as BookAppointmentUser;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mail\SubmittedMail as AppointmentBookedMail;
use App\Mail\SendEmailToStaff as SendEmailToStaff;

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
        'role' => 'required|in:registrar,cashier,guidance,elem,sr,none',
    ]);

    // Prevent duplicate appointment for same schedule
    $existing = BookAppointmentUser::where('email', $request->email)
        ->where('appointment_date', $request->appointment_date)
        ->where('appointment_time', $request->appointment_time)
        ->first();

    if ($existing) {
        return back()->with('error', 'You already booked an appointment for this schedule.');
    }

    // Prevent multiple appointments using same email
    $existingEmail = BookAppointmentUser::where('email', $request->email)->first();

    if ($existingEmail) {
        return back()->with('error', 'You already have an appointment with this email.');
    }

    // Create appointment
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

    // Broadcast event
    event(new \App\Events\NewAppointment($appointment));

    // Send confirmation email to user
    Mail::to($request->email)->send(new AppointmentBookedMail($appointment));

    // Staff email mapping
    $staffEmails = [
        'registrar' => 'vanesza.perey.mda@gmail.com',
        'cashier'   => 'kathleendonasco@gmail.com',
        'guidance'  => 'rcerenado.registrarmda@gmail.com',
        'elem'      => 'mangagawangpinoycompany@gmail.com',
        'sr'        => 'pagawpawjemoyacerenado@gmail.com',
        'none'      => 'pagawpawjemoysdsdado@gmail.com',
    ];

    $staffEmail = $staffEmails[$request->role] ?? null;

    if ($staffEmail) {
        Mail::to($staffEmail)->send(new SendEmailToStaff($appointment));
    }

    return back()->with('success', 'Your appointment has been booked successfully!');
}
                


}
