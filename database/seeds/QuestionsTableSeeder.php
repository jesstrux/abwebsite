<?php

use Illuminate\Database\Seeder;
use App\Follower;
use App\Question;
use App\QuestionCategory;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $follower_ids = Follower::all()->modelKeys();
        $question_category_ids = QuestionCategory::all()->modelKeys();

        $faker = Faker\Factory::create();

        collect($question_category_ids)
              ->each(function ($question_category_id)
                use($follower_ids, $faker) {
                for($i = 0; $i <= 15; $i++) {
                  Question::create([
                    'question_category_id' => $question_category_id,
                    'follower_id' => array_random($follower_ids),
                    'question' => $faker->paragraph(60, false),
                  ]);
                }
        });
    }
}
