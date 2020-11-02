<?php
    namespace App\Http\FormRequest;

    use App\Http\Rules\Captcha;

    class ContactPostRequest extends AbstractFormRequest
    {
        public function rules()
        {
            return [
                "name"                 => [
                    "required" ,
                    "max:255" ,
                    "min:3"
                ] , "email"            => [
                    "present" ,
                    "nullable" ,
                    "max:255" ,
                    "min:3"
                ] , "phone"            => [
                    "required" ,
                    "max:255" ,
                    "min:3"
                ] , "subject"          => [
                    "required" ,
                    "max:255" ,
                    "min:3"
                ] , "message"          => [
                    "required" ,
                    "max:255" ,
                    "min:3"
                ] ,
                "g-recaptcha-response" => [
                    new Captcha()
                ]
            ];
        }

        public function messages()
        {
            return [
                "name.required"                 => "Zorunlu Alan" ,
                "name.max"                      => "Maxsimum 255 karakter olmalıdır" ,
                "name.min"                      => "Minimum 3 karakter olmalıdır" ,
                "email.max"                     => "Maxsimum 255 karakter olmalıdır" ,
                "email.min"                     => "Minimum 3 karakter olmalıdır" ,
                "phone.required"                => "Zorunlu Alan" ,
                "phone.max"                     => "Maxsimum 255 karakter olmalıdır" ,
                "phone.min"                     => "Minimum 3 karakter olmalıdır" ,
                "subject.required"              => "Zorunlu Alan" ,
                "subject.max"                   => "Maxsimum 255 karakter olmalıdır" ,
                "subject.min"                   => "Minimum 3 karakter olmalıdır" ,
                "message.required"              => "Zorunlu Alan" ,
                "message.max"                   => "Maxsimum 255 karakter olmalıdır" ,
                "message.min"                   => "Minimum 3 karakter olmalıdır" ,
                'g-recaptcha-response.required' => 'Robot olmadığını bilmem gerek.' ,
                'g-recaptcha-response.captcha'  => 'Robot olmadığını bilmemedim.'
            ];
        }
    }