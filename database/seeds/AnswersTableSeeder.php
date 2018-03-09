<?php

use Illuminate\Database\Seeder;
use App\Answer;
use App\QuestionCategory;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $question_category_ids = QuestionCategory::all()->modelKeys();
      $youtube_ids = [
        '_pan5xdHb54', 'MgHlWr_13kY', 'vNcxEAe09kA',
        'rHStL6-XHYs', 'j6KXXmE5Kbk',
      ];
      collect($youtube_ids)
            ->each(function ($youtube_id)
              use($question_category_ids) {
                $answer = Answer::create([
                  'youtube_id' => $youtube_id,
                  'title' => 'Why do we make a big deal out of everything ' .
                             'we do in the field of technology, why not ' .
                             'just base it all on a whim?',
                ]);
                $answer->questionCategories()
                       ->sync(array_random($question_category_ids, array_random([2, 3])));
              });
    }
}
