<?php
    namespace App\Core\Models;

    use Illuminate\Database\Eloquent\Model;

    class Orders extends Model
    {
        protected $table = "orders";

        protected $fillable = ["product_id","name","email","phone","address","state","deleted"];

        public $timestamps = true;
    }