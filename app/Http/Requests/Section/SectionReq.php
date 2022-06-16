<?php

namespace App\Http\Requests\Section;

use Illuminate\Foundation\Http\FormRequest;

class SectionReq extends FormRequest
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
            'section_name' => ['required'],
            'section_desc' => ['required'],
        ];
    }

    public function messages() {
        return [
            'section_name.required' => 'Section name is required',
            'section_desc.required' => 'Description is required',
        ];
    }
}
