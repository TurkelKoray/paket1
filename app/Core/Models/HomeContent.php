<?php
    namespace App\Core\Models;

    class HomeContent extends BaseModel
    {

        protected $table = "homecontents";
        protected $fillable = [
            "img",
            "title",
            "description",
            "url",
            "orders",
            "type"
        ];

        public $timestamps = true;

    }