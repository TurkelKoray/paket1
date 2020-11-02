<?php


namespace App\Http\FormRequest;


use App\Http\Rules\ImageExtensions;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\Rule;

class MenuPostFormRequest extends AbstractFormRequest
{

    public function rules()
    {
        return [
            "name" => [
              "min:3",
              "required",
              "max:255"
            ],
            "slug" => [
                "min:3",
                "required",
                "max:255"
            ],
            "title" => [
                "string",
                "min:3",
                "present",
                "nullable",
                "max:255"
            ],
            "text1" => [
                "string",
                "present",
                "nullable"
            ], "text2" => [
                "string",
                "present",
                "nullable"
            ], "state" => [
                "present",
                Rule::in([
                    0,
                    1
                ]),
            ], "type" => [
                "required"
            ],
            "img" => [
                "present",
                App::make(ImageExtensions::class)
            ],
            "breadcrumb" => [
                "present",
                Rule::in([0,1])
            ]
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Menu adı boş bırakılamaz",
            "name.max" => "Maxsimum 255 karakter olmalıdır",
            "name.min" => "Minimum 3 karakter olmalıdır",
            "slug.required" => "Menu adı boş bırakılamaz",
            "slug.max" => "Maxsimum 255 karakter olmalıdır",
            "slug.min" => "Minimum 3 karakter olmalıdır",
            "title.max" => "Maxsimum 255 karakter olmalıdır",
            "title.min" => "Minimum 3 karakter olmalıdır",
            "type.required" => "Menu tipi boş bırakılamaz",
        ];
    }
}

