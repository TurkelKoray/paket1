<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomecontentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homecontents', function (Blueprint $table) {
            $table->id();
            $table->string("img",200);
            $table->string("title",255);
            $table->text("description")->nullable();
            $table->string("url",200)->nullable();
            $table->tinyInteger("type");
            $table->tinyInteger("orders")->default(0);
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
        Schema::dropIfExists('homecontents');
    }
}
