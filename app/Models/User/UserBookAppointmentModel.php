<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserBookAppointmentModel extends Model
{
    protected $table = 'book_appointment_user';

    protected $fillable = [
        'reference_number',
        'parent_name',
        'email',
        'appointment_date',
        'appointment_time',
        'purpose',
        'additional_note',
        'role',
        'status'
    ];

    
}
