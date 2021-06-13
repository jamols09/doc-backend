<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistoryCreateRequest extends FormRequest
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
            'description' => 'string|nullable',
            'image' => 'string|nullable',
            'patient_id' => 'required',
            'symptom.name' => 'string|nullable',
            'symptom.date' => 'date|nullable',
            'symptom.description' => 'string|max:500|nullable',
            'symptom.occured_on' => 'date|nullable',
            'diagnoses.name' => 'string|nullable',
            'diagnoses.physician_id' => 'numeric|nullable',
            'diagnoses.description' => 'string|nullable',
            'diagnoses.occured_on' => 'date|nullable'
        ];
    }
}

