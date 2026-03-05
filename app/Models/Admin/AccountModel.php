<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AccountModel extends Authenticatable
{
    use hasFactory;
    protected $table = 'admin_account';

    protected $fillable = [
        'name',
        'email',
        'password'
    ];
}
