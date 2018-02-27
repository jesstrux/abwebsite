<?php

use Illuminate\Database\Seeder;
use App\QuestionCategory;

class QuestionCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
          'Fashion', 'Love and Relationship', 'Finance',
          'Business', 'Leadership', 'Family', 'About Abella',
        ];

        collect($categories)->each(function ($category) {
          QuestionCategory::create([
            'name' => $category,
          ]);
        });
    }
}
