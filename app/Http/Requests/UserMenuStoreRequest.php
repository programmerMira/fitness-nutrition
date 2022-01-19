<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserMenuStoreRequest extends FormRequest
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
            'menu_id' => ['required', 'integer', 'exists:menus,id'],
            'menu_type_id' => ['required', 'integer', 'exists:menu_types,id'],
        ];
    }
}
