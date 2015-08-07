<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;
use App\Classified;

class ClassifiedRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->method() == 'PUT' or $this->method() == 'DELETE') {
            $id = $this->route('classifieds');
            return Classified::where('id', $id)->where('user_id', Auth::user()->id)->exists();            
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->method() == 'DELETE') {
            return [];
        }

        return [
            'title' => 'required|max:120',
            'category_id' => 'required|numeric',
            'price' => 'numeric',
            'quantity' => 'numeric|required_with:price',
            'description' => 'required|min:100',
            'photo' => 'image|mimes:jpeg,png,gif|max:1024'
        ];
    }
}
