<?php

namespace App\Core\Models;


class Menus extends BaseModel
{
    protected $table = "menus";

    protected $fillable = ["name","slug","title","text1","text2","img","headerimg","type","lang","breadcrumb","sira","homeshow","acilirmenu","deleted"];


    public function submenus()
    {
        return $this->hasMany('App\Core\Models\Submenu','menu_id','id')->orderBy('sira','asc');
    }









}
