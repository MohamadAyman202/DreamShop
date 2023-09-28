<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
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
            'name'      => 'required|string|max:100',
            'abbr'      => 'required|string|max:10',
            'direction' => 'required',
            'active'    => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'The Name Is Required',
            'name.string'           => 'The Name Required Type Is String',
            'name.max'              => 'The Name Max Count Letters 100',
            'abbr.required'         => 'The Abbr Is Required',
            'abbr.string'           =>  'The Abbr Required Type Is String',
            'abbr.max'              => 'The Abbr Max Count Letters 100',
            'direction.required'    => 'The Direction Is Required',
            'active.string'         => 'The Active Is Required',
        ];
    }
}
