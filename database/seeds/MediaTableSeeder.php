<?php

use Illuminate\Database\Seeder;
use App\Media;
use App\MediaCategory;

class MediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $media_category_ids = MediaCategory::all()->modelKeys();

        $channels = ['ITV', 'StarTV', 'Channel-Ten',];

        $titles = [
          'Nafsi Show', 'His & Hers', "Abella's Life Class",
          'Uongozi 101',
        ];

        collect($titles)->each(function ($title)
                               use ($media_category_ids, $channels) {
          Media::create([
            'title' => $title,
            'media_category_id' => array_random($media_category_ids),
            'day' => $faker->dayOfWeek('now'),
            'air_time' => $faker->time('H:i:s', 'now'),
            'description' => $faker->paragraph(3, true),
            'channel' => array_random($channels),
          ]);
        });
    }
}
