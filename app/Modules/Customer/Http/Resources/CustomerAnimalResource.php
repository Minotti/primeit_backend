<?php

namespace App\Modules\Customer\Http\Resources;

use App\Modules\Core\Http\Resources\BaseResource;

class CustomerAnimalResource extends BaseResource
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
            'name' => $this->name,
            'age' => $this->age,
            'type' => $this->type,
            'created_at' => $this->created_at
        ];
    }
}
