<?php

namespace App\Http\Requests\Consultation;

use App\Models\Consultation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'text' => ['required', 'min:5', 'max:1000', 'string'],
            'user_id' => ['exists:users,id'],
            'doctor_id' => ['required', 'exists:doctors,id'],
            'email' => ['required', 'email:rfc,dns'],
            'status'  => ['required', 'string', Rule::in(Consultation::allStatuses())]
        ];
    }
}
