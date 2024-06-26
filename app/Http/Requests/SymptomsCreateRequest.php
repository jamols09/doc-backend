<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class SymptomsCreateRequest extends FormRequest
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
        $result = [
            'name' => 'string|nullable',
            'history_id' => 'numeric|required',
            'description' => 'string|nullable',
            'occured_on' => 'nullable',
        ];
        
        return $result;
    }
}

