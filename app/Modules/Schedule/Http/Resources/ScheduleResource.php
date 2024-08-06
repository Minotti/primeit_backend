<?php

namespace App\Modules\Schedule\Http\Resources;

use App\Modules\Core\Http\Resources\BaseResource;
use App\Modules\Customer\Http\Resources\CustomerAnimalResource;
use App\Modules\Customer\Http\Resources\CustomerResource;
use App\Modules\User\Resources\UserResource;

class ScheduleResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'customer' => new CustomerResource($this->customer),
            'animal_id' => $this->animal_id,
            'animal' => new CustomerAnimalResource($this->animal),
            'doctor_id' => $this->doctor_id,
            'doctor' => new UserResource($this->doctor),
            'scheduled_at' => $this->scheduled_at->format('Y-m-d'),
            'symptoms' => $this->symptoms,
            'period' => $this->period
        ];
    }
}
