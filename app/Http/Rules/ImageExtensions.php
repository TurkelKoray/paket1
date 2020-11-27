<?php


namespace App\Http\Rules;


use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class ImageExtensions implements Rule
{

    public function passes($attribute, $value)
    {

        $allowedExtensions = ["png", "jpeg", "jpg","JPG", "gif"];
        if (!empty(Str::lower($value))) {

            $extension = $value->getClientOriginalExtension();
            if (in_array($extension, $allowedExtensions)) {
                return true;
            }

            return false;
        }
        return true;
    }

    public function message()
    {
        return "İzin verilen dosya uzantılı olmalıdır. (png,jpeg,jpg,gif)";
    }
}
