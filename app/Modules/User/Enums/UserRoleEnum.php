<?php

namespace App\Modules\User\Enums;

enum UserRoleEnum: String
{
    case Attendant = 'attendant';
    case Receptionist = 'receptionist';
    case Doctor = 'doctor';
}
