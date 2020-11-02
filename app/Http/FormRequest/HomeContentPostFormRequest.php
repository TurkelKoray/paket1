<?php
    namespace App\Http\FormRequest;

    use App\Http\Rules\ImageExtensions;
    use Illuminate\Support\Facades\App;
    use Illuminate\Validation\Rule;

    class HomeContentPostFormRequest extends AbstractFormRequest
    {
        public function rules()
        {
            return [
                "title"       => [
                    "required" ,
                    "max:255" ,
                ] ,
                "description" => [
                    "present" ,
                    "nullable" ,
                    "string" ,
                ] ,
                "img"         => [
                    "required" ,
                    App::make(ImageExtensions::class)
                ] ,
                "url"         => [
                    "present" ,
                    "nullable" ,
                    "string"
                ] ,
                "type"        => [
                    "present" ,
                    Rule::in([ 0 , 1 ])
                ]
            ];
        }

        public function messages()
        {
            return [
                "title.max"      => "Maxsimum 255 karakter olmalıdır" ,
                "title.required" => "Zorunlu Alan" ,
                "img.required"   => "Zorunlu Alan"
            ];
        }
    }