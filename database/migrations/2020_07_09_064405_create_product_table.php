<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->nullable();
            $table->string('title','255');
            $table->string('slug','255');
            $table->integer('sequence');
            $table->longText('short_description')->nullable();
            $table->longText('description');
            $table->string('thumb_image')->nullable();
            $table->string('image')->nullable();
            $table->integer('is_featured')->default(0);
            $table->string('meta_title')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_description')->nullable();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('product');
    }
}
