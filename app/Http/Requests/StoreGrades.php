<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGrades extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'Name' => 'required',
            'Name' => 'required|unique:grades|max:255',

//
//            'Name.*' => [
//                'required',
//                'unique:grades,Name',
//                'distinct',
//            ],



        ];
    }

    public function messages()
    {
        return [
            'Name.required' => trans('validation.required'),

        ];
    }
}
