<?php


namespace App\Http\Rules;


use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class MultiImageExtension implements Rule
{
    public function passes($attribute , $value)
    {
        $allowedExtensions = [
            "png","jpeg","jpg","gif"
        ];
        foreach($value as $item){
            $extension = Str::lower($item->getClientOriginalExtension());
            if(in_array($extension,$allowedExtensions)){
                return true;
            }
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string|array
     */
    public function message()
    {
        return "İzin verilen dosya uzantılı olmalıdır (png,jpeg,jpg,gif)";
    }
}
