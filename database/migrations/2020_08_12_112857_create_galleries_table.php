<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger("menu_id")->default(0);
            $table->tinyInteger("submenu_id")->default(0);
            $table->string("img",100);
            $table->string("title",100)->nullable();
            $table->string("description",255)->nullable();
            $table->tinyInteger("orders")->default(0);
            $table->tinyInteger("state")->default(0);
            $table->tinyInteger("deleted")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galleries');
    }
}
