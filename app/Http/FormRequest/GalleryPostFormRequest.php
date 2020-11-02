<?php
    namespace App\Http\FormRequest;

    use App\Http\Rules\MultiImageExtension;
    use Illuminate\Support\Facades\App;

    class GalleryPostFormRequest extends AbstractFormRequest
    {
        public function rules()
        {
            return [
                "img" => [
                    "required",
                    "image",
                    App::make(MultiImageExtension::class),
                    "max:2048"
                ],
                "title" => [
                    "present",
                    "nullable",
                    "max:255"
                ]
            ];
        }

        public function messages()
        {
            return [
                "img.required" => "Zorunlu Alan",
                "img.max" => "Maxsimum 2MB  olmalıdır",
                "title.max" => "Maxsimum 255 karakter olmalıdır",

            ];
        }
    }