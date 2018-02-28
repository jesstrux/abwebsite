<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
          $table->uuid('id');
          $table->uuid('series_category_id');
          $table->string('title');
          $table->string('air_time');
          $table->string('day');
          $table->text('description')->nullable();
          $table->string('channel');
          $table->timestamps();
          $table->softDeletes();
          $table->primary('id');
          $table->foreign('series_category_id')
                ->references('id')
                ->on('series_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('series');
    }
}
