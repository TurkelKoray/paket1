<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends BaseModel
{
    protected $table = "contacts";

    protected $fillable = ["name","gsm","phone","email","room_type","dates","times","mermer_type","subject","message","ip","state","type","filename","fileurl"];

}
