<?php

namespace App\Modules\Customer\Http\Resources;

use App\Modules\Core\Http\Resources\BaseResource;

class CustomerResource extends BaseResource
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
            'name' => $this->name,
            'email' => $this->email,
            'animals' => CustomerAnimalResource::collection($this->animals),
            'created_at' => $this->created_at
        ];
    }
}
