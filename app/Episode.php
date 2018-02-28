<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BaseModel;
use App\Series;
use App\SeriesCategory;

class Episode extends BaseModel
{
    protected $fillable = [
      'image_url', 'youtube_url', 'title',
      'description', 'date_aired', 'series_id',
      'series_category_id',
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
