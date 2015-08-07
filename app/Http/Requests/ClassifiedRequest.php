<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class ClassifiedRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:120',
            'category_id' => 'required|numeric',
            'price' => 'numeric',
            'quantity' => 'numeric|required_with:price',
            'description' => 'required|min:200',
            'photo' => 'image|mimes:jpeg,png,gif|max:1024'
        ];
    }
}
