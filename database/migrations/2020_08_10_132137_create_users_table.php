<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
			$table->string("name",255)->nullable();
			$table->string("email",191);
			$table->string("password",255)->nullable();
			$table->string("remember_token",100)->nullable();
			$table->string("img",100)->nullable();
			$table->string("yetki",100)->nullable();
			$table->string("facebook",100)->nullable();
			$table->string("twitter",100)->nullable();
			$table->string("googleplus",100)->nullable();
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
        Schema::dropIfExists('users');
    }
}
