<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('follower_id')->unsigned();
            $table->integer('question_category_id')->unsigned();
            $table->text('question');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('follower_id')
                  ->references('id')
                  ->on('followers');
            $table->foreign('question_category_id')
                  ->references('id')
                  ->on('question_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
