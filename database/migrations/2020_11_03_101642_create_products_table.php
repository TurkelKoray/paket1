<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer("category_id");
            $table->string("name",100);
            $table->string("slug",100);
            $table->string("title",225)->nullable();
            $table->text("description")->nullable();
            $table->longText("content")->nullable();
            $table->string("img",100)->nullable();
            $table->decimal("price",6,2)->nullable();
            $table->tinyInteger("state")->default(0);
            $table->integer("stock")->default(0);
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
        Schema::dropIfExists('products');
    }
}
