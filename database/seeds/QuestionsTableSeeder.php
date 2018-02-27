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
              ->each(function ($id) use($follower_ids) {
                Question::create([
                  'question_category_id' => array_random($question_category_ids),
                  'follower_id' => array_random($follower_ids),
                  'question' => $faker->paragraph(3, true),
                ]);
        });
    }
}
