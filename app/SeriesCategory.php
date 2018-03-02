<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BaseModel;
use App\Series;
use App\Episode;

class SeriesCategory extends BaseModel
{
    public static $folder = 'cms.series_categories';

    public static $forms = 'cms.series_categories.forms';

    protected $cascadeDeletes = ['series', 'episodes'];

    protected $fillable = [
      'name',
    ];

    public function series()
    {
      return $this->hasMany(Series::class);
    }

    public function episodes()
    {
      return $this->hasMany(Episode::class);
    }
}
