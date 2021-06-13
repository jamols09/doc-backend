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
            'description' => 'string|nullable',
            'occured_on' => 'nullable',
            'history_id' => 'numeric|required',
        ];
        dd( $this->request->all());

        return $result;
    }
}

