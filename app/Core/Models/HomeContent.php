<?php
    namespace App\Core\Models;

    use Carbon\Carbon;

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

        protected $appends = ["our_time"];

        public function getOurTimeAttribute()
        {
            return Carbon::parse($this->created_at)->format("d/m/Y ");
        }

        public $timestamps = true;

    }
