<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BaseModel;
use App\SeriesCategory;
use App\Episode;

class Series extends BaseModel
{
    public static $folder = 'cms.series';

    public static $forms = 'cms.series.forms';

    protected $cascadeDeletes = ['episodes'];

    protected $fillable = [
      'title', 'series_category_id', 'air_time',
      'day', 'description', 'channel',
    ];

    public function seriesCategory()
    {
      return $this->belongsTo(SeriesCategory::class);
    }

    public function episodes()
    {
      return $this->hasMany(Episode::class);
    }
}
