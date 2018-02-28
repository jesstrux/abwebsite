<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BaseModel;
use App\SeriesCategory;
use App\Episode;

class Series extends BaseModel
{
    protected $fillable = [
      'title', 'series_category_id', 'air_time',
      'day', 'description', 'channel',
    ];

    public function category()
    {
      return $this->belongsTo(SeriesCategory::class);
    }

    public function episodes()
    {
      return $this->hasMany(Episode::class);
    }
}
