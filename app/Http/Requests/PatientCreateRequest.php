<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientCreateRequest extends FormRequest
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
            'firstname' => 'required|max:50',
            'birthdate' => 'required|date',
            'sex' => 'required|in:Female,Male,None',
            'lastname' => 'string|max:50|nullable',
            'middlename' => 'string|max:50|nullable',
            'mobile' => 'string|max:13|nullable',
            'occupation' => 'string|max:50|nullable',
            'referred_by' => 'string|max:50|nullable',
            'telephone' => 'string|max:50|nullable',
            'height' => 'numeric|digits_between:1,10|nullable',
            'height_inches' => 'numeric|digits_between:1,10|nullable',
            'height_unit' => 'string|in:cm,ft,inches,meter|nullable',
            'status' => 'required|string|in:Single,Married,Divorced,Separated,Widowed,Complicated',
            'weight' => 'numeric|digits_between:1,10|nullable',
            'weight_unit' => 'string|in:kg,lb,g,oz|nullable',
            'address.barangay' => 'required',
            'address.city' => 'required',
            'address.province' => 'required',
            'address.region' => 'required',
        ];
    }
}

