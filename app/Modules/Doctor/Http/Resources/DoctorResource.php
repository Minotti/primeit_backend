<?php

namespace App\Modules\Doctor\Http\Resources;

use App\Modules\Core\Http\Resources\BaseResource;

class DoctorResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [];
    }
}
