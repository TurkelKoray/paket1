<?php


namespace App\Http\FormRequest;


use App\Http\Rules\ImageExtensions;
use Illuminate\Support\Facades\App;

class SliderPutFormRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            "title" => [
                "present",
                "nullable",
                "string",
                "max:255"
            ],
            "description" => [
                "present",
                "nullable",
                "string",
                "max:255"
            ],
            "url" => [
                "present",
                "nullable",
                "string",
                "max:255"
            ],
            "img" => [
                "present",
                "nullable",
                App::make(ImageExtensions::class)
            ]
        ];
    }

    public function messages()
    {
        return [
            "title.max" => "Maxsimum 255 karakter olmalıdır",
            "description.max" => "Maxsimum 255 karakter olmalıdır",
            "url.max" => "Maxsimum 255 karakter olmalıdır",
            "img.required" => "Bu Alan Boş Bırakılamaz"
        ];
    }
}
