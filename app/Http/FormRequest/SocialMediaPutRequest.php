<?php


namespace App\Http\FormRequest;


class SocialMediaPutRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            "facebook" => [
                "present",
                "nullable",
                "max:255",
                "min:3"
            ],
            "twitter" => [
                "present",
                "nullable",
                "string",
                "max:255",
                "min:3"
            ],
            "googleplus" => [
                "present",
                "nullable",
                "string",
                "max:255",
                "min:3"
            ],
            "pinteres" => [
                "present",
                "nullable",
                "string",
                "max:255",
                "min:3"
            ], "linkedin" => [
                "string",
                "present",
                "nullable"
            ]
        ];
    }

    public function messages()
    {
        return [
            "facebook.max" => "Maxsimum 255 karakter olmalıdır",
            "facebook.min" => "Minimum 3 karakter olmalıdır",
            "twitter.max" => "Maxsimum 255 karakter olmalıdır",
            "twitter.min" => "Minimum 3 karakter olmalıdır",
            "googleplus.max" => "Maxsimum 255 karakter olmalıdır",
            "googleplus.min" => "Minimum 3 karakter olmalıdır",
            "pinteres.max" => "Maxsimum 255 karakter olmalıdır",
            "pinteres.min" => "Minimum 3 karakter olmalıdır",
            "linkedin.max" => "Maxsimum 255 karakter olmalıdır",
            "linkedin.min" => "Minimum 3 karakter olmalıdır",
        ];
    }
}
