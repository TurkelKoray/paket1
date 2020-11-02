<?php


namespace App\Http\FormRequest;


class MapsPutFormRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            "mapskey" => [
                "present",
                "nullable",
                "max:255",
                "min:3"
            ]
        ];
    }

    public function messages()
    {
        return [
            "mapskey.max" => "Maxsimum 255 karakter olmalıdır",
            "mapskey.min" => "Minimum 3 karakter olmalıdır",
        ];
    }
}
