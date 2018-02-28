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
            $table->uuid('id');
            $table->uuid('follower_id');
            $table->uuid('question_category_id');
            $table->text('question');
            $table->timestamps();
            $table->softDeletes();
            $table->primary('id');
            $table->foreign('follower_id')
                  ->references('id')
                  ->on('followers');
            $table->foreign('question_id')
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
