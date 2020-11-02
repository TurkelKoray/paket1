<?php


namespace App\Http\FormRequest;


class EmailSettingPutFormRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            "hostname" => [
                "required",
                "string",
                "max:255"
            ],
            "username" => [
                "required",
                "string",
                "max:255"
            ],
            "pasword" => [
                "required",
                "string",
                "max:255"
            ]
        ];
    }

    public function messages()
    {
        return [
            "hostname.required" => "Bu Alan Zorunludur",
            "hostname.max" => "Maxsimum 255 karakter olmalıdır",
            "username.required" => "Bu Alan Zorunludur",
            "username.max" => "Maxsimum 255 karakter olmalıdır",
            "pasword.required" => "Bu Alan Zorunludur",
            "pasword.max" => "Maxsimum 255 karakter olmalıdır",
        ];
    }
}
