<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(FollowersTableSeeder::class);
        $this->call(MediaCategoriesTableSeeder::class);
        $this->call(MediaTableSeeder::class);
        $this->call(EpisodesTableSeeder::class);
        $this->call(QuestionCategoriesTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(AnswersTableSeeder::class);
    }
}
