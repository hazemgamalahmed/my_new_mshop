<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'price' => 'required|numeric',
            'limit' => 'required|numeric'

        ];
        if($this->input('category_id')){
            $rules['category_id'] = 'exists:categories,id';
        }

        return $rules;

    }

    public function messages()
    {
        return [
            'category_id.exists' => 'Invalid Category',
            'name.required' => 'plese Enter The Name Of The Product',
            'price.required' => 'The Price Is Required',
            'price.numeric' => 'Price Must Be Numeric'
        ];
    }

    
}
