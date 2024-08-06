<?php

namespace App\Modules\User\Enums;

enum UserRoleEnum: String
{
    case ATTENDANT = 'ATTENDANT';
    case RECEPTIONIST = 'RECEPTIONIST';
    case DOCTOR = 'DOCTOR';
}
