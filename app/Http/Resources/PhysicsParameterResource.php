<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PhysicsParameterResource extends JsonResource
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
            'user_id' => $this->user_id,
            'training_id' => $this->training_id,
            'phase_number' => $this->phase_number,
            'photoes' => $this->photoes,
            'weight' => $this->weight,
            'height' => $this->height,
            'dream_weight' => $this->dream_weight,
            'current_weight' => $this->current_weight,
            'hips_cm' => $this->hips_cm,
            'waist_cm' => $this->waist_cm,
            'chest_cm' => $this->chest_cm,
        ];
    }
}
