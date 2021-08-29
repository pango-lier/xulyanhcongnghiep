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
            $table->string('name');
            $table->integer('price');
            $table->string('slug');
            $table->text('description',1000)->nullable();
            $table->text('content')->nullable();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('category_id');
            $table->string('img_path');
            $table->string('video_link')->nullable();
            $table->bigInteger('count_views');
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
        Schema::dropIfExists('products');
    }
}
