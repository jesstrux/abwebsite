<?php

use Illuminate\Database\Seeder;
use App\NewsFeed;

class NewsFeedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();
      for($i = 0; $i <= 15; $i++) {
        NewsFeed::create([
          'title' => $faker->sentence(5, false),
          'youtube_id' => str_random(10),
        ]);
      }
    }
}
