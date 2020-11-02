<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = "settings";

    protected $fillable = [
        'email', 'phone','gsm', 'fax','headcode', 'bodycode','address', 'footer','mapskey', 'googleCode','longitude', 'latitude','title', 'slogan',
        'description','keywords', 'facebook','twitter', 'pinteres','googleplus', 'hostname','username','design','linkedin','ogimages','instagram','youtube'
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = false;
}
