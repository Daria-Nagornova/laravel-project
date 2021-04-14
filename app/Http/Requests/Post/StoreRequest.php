<?php

namespace App\Http\Requests\Post;

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
            'title' => ['required', 'min:5', 'max:100', 'string'],
            'content' => ['required', 'min:20', 'max:1000', 'string'],
            'category_id' => ['required', 'string', 'exists:categories,id'],
            'subcategory_id' => ['required', 'string', 'exists:subcategories,id'],
            'user_id' => ['exists:users,id'],
            'image' => ['required', 'image', 'mimes:jpeg,bmp,png', 'max:2000']
        ];
    }
}
