<?php

namespace App\Modules\Customer\Models;
use Illuminate\Database\Eloquent\Model;

class CustomerAnimal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'name',
        'age',
        'type'
    ];

    protected $casts = [
        'customer_id' => 'int',
        'age' => 'int',
    ];
}
