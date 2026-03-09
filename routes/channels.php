<?php 

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('appointments.{role}', function ($user, $role) {
    return $user->role === $role;
});