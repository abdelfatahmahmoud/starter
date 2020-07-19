<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequset extends FormRequest
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

            'name' => 'required|max:100|unique:Offers,name',
            'price' => 'required|numeric',
            'detials' => 'required',
        ];
    }

    public function messages()
    {
        return [

            'name.required'     =>       __('ar.Offer name is required'),
            'name.max:100'      =>        __('ar.Offer max lenght 100 charcter'),
            'name.unique'       =>         __('ar.Offer your name must be unique'),
            'price.numeric'     =>       __('ar.Offer the price must be number'),
            'price.required'    =>      __('ar.Offer the field is empty'),
            'detials.required'  =>    __('ar.Offer detials is required'),

        ];
    }
}
