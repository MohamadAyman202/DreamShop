<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'             => 'required',
            'images'            => 'required|mimes:png,jpg,jpeg,gif,svg|dimensions:width:300,height:300',
            'featured'          => 'required',
            'status'            => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required'                => 'The Title Is Required',
            'status.required'               => 'The Status Is Required',
            'images.required'               => 'The Image Is Required',
            'images.mimes'                  => 'The Image Must End With An Extension: png,jpg,jpeg,gif,svg',
            'images.dimensions'             => 'The Image Is Required With 300px And Height: 300px',
            'featured.required'             => 'The Featured Is Required',
        ];
    }
}
