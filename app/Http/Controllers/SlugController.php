<?php


namespace App\Http\Controllers;


use Illuminate\Support\Str;

class SlugController extends Controller
{
    public function slug($text)
    {
        return Str::slug($text);
    }
}
