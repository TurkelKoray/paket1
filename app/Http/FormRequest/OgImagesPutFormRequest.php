<?php


namespace App\Http\FormRequest;


use App\Http\Rules\ImageExtensions;
use Illuminate\Support\Facades\App;

class OgImagesPutFormRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            "img" => [
                "required",
                "max:2048",
                App::make(ImageExtensions::class)
            ]
        ];
    }

    public function messages()
    {
        return [
            "img.required" => "Bu Alan Zorunludur",
            "img.max" => "Maxsimum 2mb olmalıdır",
        ];
    }
}
