<?php


namespace App\Helpers;


use Illuminate\Support\Str;

class HelpersFunctions
{

    public function slug($text)
    {
        return Str::slug($text);
    }
}
