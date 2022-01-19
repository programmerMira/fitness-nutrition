<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DayStoreRequest extends FormRequest
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
            'training_id' => ['required', 'integer', 'exists:trainings,id'],
            'day_number' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:1000'],
            'videos' => ['required', 'json'],
            'info' => ['required', 'json'],
            'training_location_id' => ['required', 'integer', 'exists:training_locations,id'],
        ];
    }
}
