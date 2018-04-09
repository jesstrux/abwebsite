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
      $youtube_ids = [
        '_pan5xdHb54', 'MgHlWr_13kY', 'vNcxEAe09kA',
        'rHStL6-XHYs', '3HsLli1RmHI',
      ];
      for($i = 0; $i <= 15; $i++) {
        NewsFeed::create([
          'title' => $faker->sentence(5, false),
          'youtube_id' => array_random($youtube_ids),
        ]);
      }
    }
}
