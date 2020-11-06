<?php


	namespace App\Core\Models;


	use Illuminate\Database\Eloquent\Model;

    class Product extends Model
	{
        protected $table = "products";

        protected $fillable = ["category_id","name","slug","title","description","content","img","price","state","stock","deleted"];

        public $timestamps = false;
	}
