<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
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
            'menu_calories_id' => $this->menu_calories_id,
            'menu_content' => $this->menu_content,
            'menu_price' => $this->menu_price,
            'proteins' => $this->proteins,
            'fat' => $this->fat,
            'carbs' => $this->carbs,
        ];
    }
}
