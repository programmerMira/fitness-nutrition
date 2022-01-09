<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalAccountStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'age' => ['required', 'integer'],
            'life_style_id' => ['required', 'integer', 'exists:life_styles,id'],
            'problem_zone_id' => ['required', 'integer', 'exists:problem_zones,id'],
            'training_location_id' => ['required', 'integer', 'exists:training_locations,id'],
            'menu_calories_id' => ['required', 'integer', 'exists:menu_calories,id'],
            'deactivated_at' => ['required', 'timestamp'],
        ];
    }
}
