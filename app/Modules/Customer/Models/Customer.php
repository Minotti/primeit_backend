<?php

namespace App\Modules\Customer\Models;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email'
    ];

    protected $with = ['animals'];

    public function animals(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CustomerAnimal::class);
    }
}
