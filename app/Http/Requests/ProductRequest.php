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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'                 => 'required',
            'purchased'             => 'required',
            'selling'               => 'required',
            'category_id'           => 'required',
            'sub_category_id'       => 'required',
            'unit'                  => 'required',
            'overview'              => 'required',
            'description'           => 'required',
            'status'                => 'required',
            'brand_id'              => 'required',
            'tax_rule_id'           => 'required',
            'bundle_deal_id'        => 'required',
            'meta_title'            => 'required',
            'meta_description'      => 'required',
            'images[].*'            => 'required|mimes:png,jpg,jpeg,gif,svg|dimensions:max_width:300,min_height:300|max:5120',
        ];
    }

    public function messages()
    {
        return [
            'title.required'                => 'The Title Is Required',
            'purchased.required'            => 'The Purchased Is Required',
            'selling.required'              => 'The Selling Is Required',
            'category_id.required'          => 'The Category Is Required',
            'sub_category_id.required'      => 'The Sub Category Is Required',
            'unit.required'                 => 'The Unit Is Required',
            'overview.required'             => 'The Overview Is Required',
            'description.required'          => 'The Description Is Required',
            'status.required'               => 'The Status Is Required',
            'brand_id.required'             => 'The Brand Is Required',
            'tax_rule_id.required'          => 'The Tax Rules Is Required',
            'bundle_deal_id.required'       => 'The Bundle Deal Is Required',
            'meta_title.required'           => 'The Meta Title Is Required',
            'meta_description.required'     => 'The Neta Description Is Required',
            'images[].required'             => 'The Image Is Required',
            'images[].mimes'                => 'The Image Must End With An Extension: png,jpg,jpeg,gif,svg',
            'images[].dimensions'           => 'The Image Is Required With 300px And Height: 300px',
        ];
    }
}
