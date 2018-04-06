<?php

use Illuminate\Database\Seeder;
use App\SeriesCategory;

class SeriesCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      SeriesCategory::create([
        'name' => 'TV Shows',
      ]);

      SeriesCategory::create([
        'name' => 'Mentorship',
      ]);
    }
}
