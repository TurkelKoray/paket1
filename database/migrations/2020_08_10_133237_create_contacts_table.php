<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string("name",255)->nullable();
            $table->string("gms",20)->nullable();
            $table->string("phone",20)->nullable();
            $table->string("email",100)->nullable();
            $table->string("subject",100)->nullable();
            $table->text("message")->nullable();
            $table->string("ip",50)->nullable();
            $table->tinyInteger("state")->default(0);
            $table->timestamps();
            $table->string("filename")->nullable();
            $table->string("fileurl")->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
