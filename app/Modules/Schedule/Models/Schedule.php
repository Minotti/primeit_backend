<?php

namespace App\Modules\Schedule\Models;
use App\Modules\Customer\Models\Customer;
use App\Modules\Customer\Models\CustomerAnimal;
use App\Modules\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'animal_id',
        'date',
        'period',
        'symptoms',
        'doctor_id',
        'created_by',
        'scheduled_at'
    ];

    protected $with = ['customer', 'animal', 'doctor'];
    protected $casts = [
        'scheduled_at' => 'date',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function animal()
    {
        return $this->belongsTo(CustomerAnimal::class, 'animal_id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
