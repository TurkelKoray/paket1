<?php

namespace App\Core\Models;


use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    protected $fillable = [	"languages"	,"lang","state"];

    public $timestamps = false;
}
