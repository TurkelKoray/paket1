<?php
    namespace App\Core\Models;


    class Orders extends BaseModel
    {
        protected $table = "orders";

        protected $fillable = ["product_id","name","email","phone","address","state","deleted"];

        public $timestamps = true;

        public function product()
        {
            return $this->belongsTo(Product::class,"product_id","id");
        }
    }