<?php

namespace App\Http\Requests\Walk;

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
            'child_id' => ['required', 'exists:children,id'],
            'start' => ['required'],
            'end' => ['required']
        ];
    }
}
