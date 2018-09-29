<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeveloperRequest extends FormRequest
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
     * Get the validation Message.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required'                   => 'Email address is required.',
            'programming_language_id.required' => 'Programming language is required.',
            'language_id.required'             => 'Language is required.'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'                   => 'required|unique:developers',
            'programming_language_id' => 'required',
            'language_id'             => 'required',
        ];
    }
}
