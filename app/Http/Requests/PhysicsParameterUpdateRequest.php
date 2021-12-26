<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhysicsParameterUpdateRequest extends FormRequest
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
            'weight' => ['required', 'numeric'],
            'height' => ['required', 'numeric'],
            'dream_weight' => ['required', 'numeric'],
            'current_weight' => ['required', 'numeric'],
            'hips_cm' => ['required', 'numeric'],
            'waist_cm' => ['required', 'numeric'],
            'chest_cm' => ['required', 'numeric'],
        ];
    }
}
