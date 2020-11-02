<?php

namespace App\Core\Models;


class Slider extends BaseModel
{
    protected $fillable = ["title","img","sira","url","description","state","lang"];

    public $timestamps = false;
}
