<?php


	namespace App\Http\FormRequest;


	use App\Http\Rules\ImageExtensions;
    use Illuminate\Support\Facades\App;
    use Illuminate\Validation\Rule;

    class ProductPutFormRequest extends AbstractFormRequest
	{
        public function rules()
        {
            return [
                "name" => [
                    "min:3",
                    "required",
                    "max:255"
                ],
                "category_id" => [
                    "integer",
                    "required"
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
                "description" => [
                    "string",
                    "present",
                    "nullable"
                ], "content" => [
                    "string",
                    "present",
                    "nullable"
                ], "state" => [
                    "present",
                    Rule::in([0, 1]),
                ],
                "price" => [
                    "required",
                ],
                "img" => [
                    "present",
                    App::make(ImageExtensions::class)
                ],
                "stock" => [
                    "required",
                    "integer"
                ],
                "state" => [
                    "present",
                    Rule::in([0, 1])
                ]
            ];
        }

        public function messages()
        {
            return [
                "name.required" => "Zorunlu Alan ",
                "name.max" => "Maxsimum 255 karakter olmalıdır",
                "name.min" => "Minimum 3 karakter olmalıdır",
                "slug.required" => "Zorunlu Alan ",
                "slug.max" => "Maxsimum 255 karakter olmalıdır",
                "slug.min" => "Minimum 3 karakter olmalıdır",
                "title.max" => "Maxsimum 255 karakter olmalıdır",
                "title.min" => "Minimum 3 karakter olmalıdır",
                "price.required" => "Zorunlu Alan ",
            ];
        }
	}
