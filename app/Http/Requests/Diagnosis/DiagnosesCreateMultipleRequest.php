<?php

namespace App\Http\Requests\Diagnosis;

use Illuminate\Foundation\Http\FormRequest;
class DiagnosesCreateMultipleRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            '*.name' => 'string|nullable',
            '*.history_id' => 'numeric|nullable',
            '*.description' => 'string|nullable',
            '*.occured_on' => 'nullable',
            '*.physician_id' => 'numeric|nullable'
        ];
    }
}

