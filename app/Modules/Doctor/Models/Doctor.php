<?php

namespace App\Modules\Doctor\Models;

use App\Modules\Doctor\Models\Scopes\DoctorScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;

#[ScopedBy([DoctorScope::class])]
class Doctor extends Model
{
    protected $table = 'users';
}
