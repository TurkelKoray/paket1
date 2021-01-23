<?php


namespace App\Http\FormRequest;


class SettingsPutFormRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            "email" => [
                "email",
                "present",
                "nullable",
                "max:255",
                "min:3"
            ],
            "phone" => [
                "present",
                "nullable",
                "string",
                "max:20",
                "min:10"
            ],
            "gsm" => [
                "present",
                "nullable",
                "string",
                "max:20",
                "min:10"
            ],
            "fax" => [
                "present",
                "nullable",
                "string",
                "max:20",
                "min:10"
            ], "address" => [
                "string",
                "present",
                "nullable"
            ], "request_form_link" => [
                "string",
                "present",
                "nullable"
            ]
        ];
    }

    public function messages()
    {
        return [
            "email.email" => "Email formatında girmelisiniz",
            "email.max" => "Maxsimum 255 karakter olmalıdır",
            "email.min" => "Minimum 3 karakter olmalıdır",
            "phone.integer" => "Sayısal Değer Girmelisiniz",
            "phone.max" => "Maxsimum 20 karakter olmalıdır",
            "phone.min" => "Minimum 10 karakter olmalıdır",
            "gsm.integer" => "Sayısal Değer Girmelisiniz",
            "gsm.max" => "Maxsimum 20 karakter olmalıdır",
            "gsm.min" => "Minimum 10 karakter olmalıdır",
            "fax.integer" => "Sayısal Değer Girmelisiniz",
            "fax.max" => "Maxsimum 20 karakter olmalıdır",
            "fax.min" => "Minimum 10 karakter olmalıdır",
        ];
    }
}
