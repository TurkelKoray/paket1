<?php


namespace App\Core\Models;


use Illuminate\Database\Eloquent\Model;

class Type extends Model
{

    protected $fillable = ["name","value","state"];

    public $timestamps =false;

}
