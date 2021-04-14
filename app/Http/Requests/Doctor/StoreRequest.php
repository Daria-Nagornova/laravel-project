<?php

namespace App\Http\Requests\Doctor;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => ['required', 'min:2', 'max:30', 'string'],
            'description' => ['required', 'min:30', 'max:1000', 'string'],
            'specialisation_id' => ['required', 'exists:specialisations,id'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'image' => ['required', 'image', 'mimes:jpeg,bmp,png', 'max:2000']
        ];
    }
}
