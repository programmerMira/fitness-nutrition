<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuStoreRequest extends FormRequest
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
            'menu_type_id' => ['required', 'integer', 'exists:menu_types,id'],
            'menu_calories_id' => ['required', 'integer', 'exists:menu_calories,id'],
            'menu_content' => ['required', 'json'],
            'menu_price' => ['required', 'double'],
        ];
    }
}
