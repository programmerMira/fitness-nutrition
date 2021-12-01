<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonalAccountResource extends JsonResource
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
            'age' => $this->age,
            'weight' => $this->weight,
            'height' => $this->height,
            'dream_weight' => $this->dream_weight,
            'life_style_id' => $this->life_style_id,
            'problem_zone_id' => $this->problem_zone_id,
            'training_location_id' => $this->training_location_id,
            'menu_calories_id' => $this->menu_calories_id,
            'hips_cm' => $this->hips_cm,
            'waist_cm' => $this->waist_cm,
            'chest_cm' => $this->chest_cm,
            'photos' => $this->photos,
        ];
    }
}
