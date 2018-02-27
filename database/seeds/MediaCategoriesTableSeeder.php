<?php

use Illuminate\Database\Seeder;
use App\MediaCategory;

class MediaCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      MediaCategory::create([
        'name' => 'TV Shows',
      ]);

      MediaCategory::create([
        'name' => 'Feel Me',
      ]);
    }
}
