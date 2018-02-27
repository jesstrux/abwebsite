<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid');
            $table->integer('media_category_id');
            $table->string('title');
            $table->string('air_time');
            $table->string('day');
            $table->text('description')->nullable();
            $table->string('channel');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('media_category_id')
                  ->references('id')
                  ->on('media_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}
