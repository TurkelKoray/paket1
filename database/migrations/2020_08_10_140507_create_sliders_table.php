<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string("title",255)->nullable();
            $table->string("description",255)->nullable();
            $table->string("url",255)->nullable();
            $table->string("img",255)->nullable();
            $table->string("lang",10)->nullable();
            $table->tinyInteger("sira")->default(0);
            $table->tinyInteger("state")->default(0);
            $table->tinyInteger("deleted")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
