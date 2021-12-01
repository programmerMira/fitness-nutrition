<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TrainingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'training_location_id' => $this->training_location_id,
            'name' => $this->name,
            'description' => $this->description,
            'training_days' => $this->training_days,
        ];
    }
}
