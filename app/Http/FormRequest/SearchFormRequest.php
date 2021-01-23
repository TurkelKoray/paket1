<?php
    namespace App\Http\FormRequest;

    class SearchFormRequest extends AbstractFormRequest
    {
        public function rules()
        {
            return [
                "q" => [
                    "string"
                ]
            ];
        }

        public function messages()
        {
            return [];
        }

    }