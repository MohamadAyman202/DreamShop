<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BundleDealsRequest extends FormRequest
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
            'title' => 'required',
            'free'  => 'required',
            'buy'   => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The Title Is Required',
            'free.required'  => 'The Count Free Is Required',
            'buy.required'   => 'The Count Buy Is Required'
        ];
    }
}
