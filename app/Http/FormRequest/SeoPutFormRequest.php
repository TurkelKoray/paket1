<?php


namespace App\Http\FormRequest;


class SeoPutFormRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            "title" => [
                "present",
                "nullable",
                "max:255",
                "min:3"
            ],
            "description" => [
                "present",
                "nullable",
                "string",
                "max:255",
                "min:3"
            ],
            "keywords" => [
                "present",
                "nullable",
                "string",
                "max:255",
                "min:3"
            ],
            "footer" => [
                "present",
                "nullable",
                "string",
                "max:255",
                "min:3"
            ], "footerdesc" => [
                "string",
                "present",
                "nullable"
            ]
        ];
    }

    public function messages()
    {
        return [
            "title.max" => "Maxsimum 255 karakter olmalıdır",
            "title.min" => "Minimum 3 karakter olmalıdır",
            "description.max" => "Maxsimum 255 karakter olmalıdır",
            "description.min" => "Minimum 3 karakter olmalıdır",
            "keywords.max" => "Maxsimum 255 karakter olmalıdır",
            "keywords.min" => "Minimum 3 karakter olmalıdır",
            "footer.max" => "Maxsimum 255 karakter olmalıdır",
            "footer.min" => "Minimum 3 karakter olmalıdır",
        ];
    }
}
