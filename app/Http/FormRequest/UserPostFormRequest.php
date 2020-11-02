<?php


namespace App\Http\FormRequest;


use Illuminate\Validation\Rule;

class UserPostFormRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            "name" => [
                "required",
                "string",
                "max:255",
                "min:3"
            ],
            "email" => [
                "required",
                "string",
                "max:255",
                "email",
                "unique:users"
            ],
            "password" => [
                "required",
                "string",
                "max:255",
                "min:6"
            ],
            "yetki" => [
                "required",
                Rule::in(10)
            ]
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Bu Alan Boş Bırakılamaz",
            "name.min" => "Minimum 3 karakter olmalıdır",
            "name.max" => "Maxsimum 255 karakter olmalıdır",
            "email.required" => "Bu Alan Boş Bırakılamaz",
            "email.max" => "Maxsimum 255 karakter olmalıdır",
            "email.email" => "Email Adresi Girmelisiniz",
            "email.unique" => "Email Sistemde Kayıtlıdır",
            "password.required" => "Bu Alan Boş Bırakılamaz",
            "password.max" => "Maxsimum 255 karakter olmalıdır",
            "yetki.required" => "Bu Alan Boş Bırakılamaz"
        ];
    }
}
