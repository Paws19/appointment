<?php

namespace App\Models\Staff;

use Illuminate\Database\Eloquent\Model;

class StaffModel extends Model
{
    protected $table = 'staff_account';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role',
        'department',
    ];

    protected $hidden = [
        'password',
    ];
}
