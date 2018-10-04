<?php

namespace App\Http\Requests;

class LanguageRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|max:50|unique:languages,code,'.$this->segment(2)
        ];
    }
}
