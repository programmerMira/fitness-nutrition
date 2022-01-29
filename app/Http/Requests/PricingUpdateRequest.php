<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PricingUpdateRequest extends FormRequest
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
            'month' => ['required', 'string', 'max:50'],
            'number' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'discount' => ['required', 'numeric'],
        ];
    }
}
