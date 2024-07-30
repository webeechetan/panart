<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('parent_id')->default(0);
            $table->string('name','255');
            $table->string('slug','255');
            $table->integer('sequence')->default(0);
            $table->integer('is_featured')->default(0);
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->string('thumb_image')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
