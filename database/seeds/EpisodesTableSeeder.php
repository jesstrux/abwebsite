<?php

use Illuminate\Database\Seeder;
use App\Series;
use App\SeriesCategory;
use App\Episode;

class EpisodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $series_ids = Series::all()->modelKeys();
      $series_category_ids = SeriesCategory::all()->modelKeys();
      $episodes = [
          [
              "youtube_id" => "_pan5xdHb54",
              "title" => "Jinsi ya kuthamini mambo yote na sio unayoyapenda tu...",
              "date_aired" => "Dec 5th",
              "series_id" => $series_ids[0],
              "series_category_id" => $series_category_ids[0],
          ],
          [
              "youtube_id" => "MgHlWr_13kY",
              "title" => "Why always me you ask? And to that I say why not always you?",
              "date_aired" => "Dec 12th",
              "series_id" => $series_ids[4],
              "series_category_id" => $series_category_ids[0],
          ],
          [
              "youtube_id" => "vNcxEAe09kA",
              "title" => "Wisest man that ever lived(My father), told me do you see the way th...",
              "date_aired" => "Dec 19th",
              "series_id" => $series_ids[3],
              "series_category_id" => $series_category_ids[0],
          ],
          [
              "youtube_id" => "rHStL6-XHYs",
              "title" => "Life isn't just earning your first salary or even putting your kids through private...",
              "date_aired" => "Dec 26th",
              "series_id" => $series_ids[2],
              "series_category_id" => $series_category_ids[0],
          ],
          [
              "youtube_id" => "3HsLli1RmHI",
              "title" => "If you're life's a collection of ups, expect a major downfall coming your way...",
              "date_aired" => "Jan 7th",
              "series_id" => $series_ids[1],
              "series_category_id" => $series_category_ids[0],
          ],
          [
              "youtube_id" => "3HsLli1RmHI",
              "title" => "Starting over can be hard, but sometimes it just can't be helped, so how does one...",
              "date_aired" => "Jan 12th",
              "series_id" => $series_ids[6],
              "series_category_id" => $series_category_ids[1],
          ]
      ];

      collect($episodes)->each(function($episode) {
        Episode::create($episode);
      });

    }
}
