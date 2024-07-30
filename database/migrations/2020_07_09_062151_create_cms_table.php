<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('name');
			$table->string('slug');
			$table->longText('short_description');
			$table->longText('description');
			$table->string('image');
			$table->tinyInteger('status')->default(1);
			$table->string('meta_title');
			$table->string('meta_description');
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
        Schema::dropIfExists('cms');
    }
}
