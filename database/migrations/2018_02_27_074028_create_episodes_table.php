<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('series_id')->unsigned();
            $table->integer('series_category_id')->unsigned();
            $table->string('image_url')->nullable();
            $table->string('youtube_url');
            $table->text('title');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('series_category_id')
                  ->references('id')
                  ->on('series_categories');
            $table->foreign('series_id')
                  ->references('id')
                  ->on('series');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodes');
    }
}
