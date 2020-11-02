<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
			$table->string("email",255)->nullable();
			$table->string("phone",255)->nullable();
			$table->string("gsm",255)->nullable();
			$table->string("fax",255)->nullable();
			$table->text("headcode")->nullable();
			$table->text("bodycode")->nullable();
			$table->text("address")->nullable();
			$table->text("footer")->nullable();
			$table->text("footerdesc")->nullable();
			$table->text("mapskey")->nullable();
			$table->text("googleCode")->nullable();
			$table->string("longitude",255)->nullable();
			$table->string("latitude",255)->nullable();
			$table->string("title",255)->nullable();
			$table->string("slogan",255)->nullable();
			$table->string("ogimages",255)->nullable();
			$table->text("description")->nullable();
			$table->string("keywords",255)->nullable();
			$table->string("facebook",255)->nullable();
			$table->string("twitter",255)->nullable();
			$table->string("pinteres",255)->nullable();
			$table->string("linkedin",255)->nullable();
			$table->string("googleplus",255)->nullable();
			$table->string("hostname",255)->nullable();
			$table->string("username",255)->nullable();
			$table->string("pasword",255)->nullable();
			$table->string("design",255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
