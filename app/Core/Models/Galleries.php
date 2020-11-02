<?php
    namespace App\Core\Models;

    class Galleries extends BaseModel
    {

        protected $fillable = [
          "img",
          "menu_id",
          "submenu_id",
          "title",
          "description",
          "orders",
          "state"
        ];

        public $timestamps = true;
    }