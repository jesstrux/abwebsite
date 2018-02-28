<?php

use Illuminate\Database\Seeder;
use App\SeriesCategory;
use App\Series;

class SeriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

      $series_category_ids = SeriesCategory::all()->modelKeys();

      $channels = ['ITV', 'StarTV', 'Channel-Ten',];

      $titles = [
        'Nafsi Show', 'His & Hers', "Abella's Life Class",
        'Uongozi 101',
      ];

      collect($titles)->each(function ($title)
                             use ($series_category_ids, $channels) {
        Series::create([
          'title' => $title,
          'series_category_id' => array_random($series_category_ids),
          'day' => $faker->dayOfWeek('now'),
          'air_time' => $faker->time('H:i:s', 'now'),
          'description' => $faker->paragraph(3, true),
          'channel' => array_random($channels),
        ]);
      });
    }
}
