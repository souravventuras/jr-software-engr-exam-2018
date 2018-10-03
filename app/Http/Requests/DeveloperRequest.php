<?php

namespace App\Http\Requests;

class DeveloperRequest extends Request {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'                    => 'required|email|max:150|unique:developers,email,' . $this->segment(2),
            'programming_language_ids' => 'required|array|distinct',
            'language_ids'             => 'required|array|distinct',
        ];
    }
}
