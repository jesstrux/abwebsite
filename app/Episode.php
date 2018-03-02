<?php

namespace App;

use App\BaseModel;
use App\Series;
use App\SeriesCategory;

class Episode extends BaseModel
{
    public static $folder = 'cms.episodes';

    public static $forms = 'cms.episodes.forms';

    protected $fillable = [
      'youtube_url', 'title', 'description',
      'date_aired', 'series_id', 'series_category_id',
    ];

    public function category()
    {
      return $this->belongsTo(SeriesCategory::class);
    }

    public function series()
    {
      return $this->belongsTo(Series::class);
    }
}
