<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
			$table->string("name",255)->nullable();
			$table->string("slug",255)->nullable();
			$table->string("title",255)->nullable();
			$table->text("text1")->nullable();
			$table->text("text2")->nullable();
			$table->string("img",255)->nullable();
			$table->string("headerimg",255)->nullable();
			$table->string("type",255)->nullable();
			$table->tinyInteger("acilirmenu")->default(0);
			$table->string("lang",255)->nullable();
			$table->string("state",255)->nullable();
			$table->tinyInteger("homeshow")->default(0);
			$table->tinyInteger("sira")->default(0);
            $table->tinyInteger("breadcrumb")->default(0);
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
        Schema::dropIfExists('menus');
    }
}
