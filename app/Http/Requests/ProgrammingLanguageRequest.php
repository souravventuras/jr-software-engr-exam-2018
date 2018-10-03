<?php

namespace App\Http\Requests;

class ProgrammingLanguageRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:50|unique:programming_languages,name,'.$this->segment(2)
        ];
    }
}
