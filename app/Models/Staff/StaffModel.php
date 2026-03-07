<?php

namespace App\Models\Staff;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class StaffModel extends Authenticatable
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
