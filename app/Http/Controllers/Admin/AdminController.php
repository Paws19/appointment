<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\AccountModel;
use App\Models\Staff\StaffModel;
use Illuminate\Support\Facades\Hash;


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

    public function CreateStaffAccount(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',

        // email must end with @mda.edu.ph
        'email' => [
            'required',
            'email',
            'regex:/^[a-z]\.[a-z]+@mda\.edu\.ph$/',
            'unique:staff_account,email'
        ],

        // password confirmation validation
        'password' => 'required|string|min:8|confirmed',

        'role' => 'required|in:registrar,cashier,guidance,elem,sr',

        'department' => 'required|in:elem,jh,shs,all',
    ]);

    $staff = StaffModel::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => strtolower($request->email),
        'password' => Hash::make($request->password),
        'role' => $request->role,
        'department' => $request->department,
    ]);

    if (!$staff) {
        return redirect()->route('admin.dashboard')
            ->with('error', 'Failed to create staff account.');
    }

    return redirect()->route('admin.dashboard')
        ->with('success', 'Staff account created successfully.');
}


public function UpdateStaffAccount(Request $request, $id)
{
    // Find the staff account
    $staff = StaffModel::findOrFail($id);

    // Validation rules
    $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => [
            'required',
            'email',
            'regex:/^[a-z]\.[a-z]+@mda\.edu\.ph$/',
            'unique:staff_account,email,' . $id, // ignore current record
        ],
        'role' => 'required|in:registrar,cashier,guidance,elem,sr,none',
        'department' => 'required|in:elem,jh,shs,all',
        'status' => 'required|in:Active,Inactive',
    ];

    // If password is provided, validate it
    if ($request->filled('password')) {
        $rules['password'] = 'nullable|string|min:8|confirmed';
    }

    $request->validate($rules);

    // Prepare data to update
    $data = [
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => strtolower($request->email),
        'role' => $request->role,
        'department' => $request->department,
        'status' => $request->status,
    ];

    // Only update password if provided
    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    }

    // Update the staff record
    $staff->update($data);

    return redirect()->route('admin.dashboard')
        ->with('success', 'Staff account updated successfully.');
}



  public function deleteAccount($id)
{
    $staff = StaffModel::find($id);

    if (!$staff) {
        return response()->json(['success' => false]);
    }

    $staff->delete();

    return response()->json(['success' => true]);
}

}
