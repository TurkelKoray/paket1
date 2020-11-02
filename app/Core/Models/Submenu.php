<?php

namespace App\Core\Models;


class Submenu extends BaseModel
{
    protected $table = "submenus";

    protected $fillable = ["menu_id","name","slug","title","text1","text2","img","headerimg","type","lang","breadcrumb","sira"];

    /*
    public  function menu(){
        return $this->hasOne('App\Core\Models\Menus','id','menu_id');
    }
    */

	public  function menu(){
		return $this->belongsTo('App\Core\Models\Menus','menu_id','id');
	}

    public function subsubmenus()
    {
        return $this->hasMany('App\Core\Models\Subsubmenu','submenu_id','id')->orderBy('sira','asc');
    }
}
