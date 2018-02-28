<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BaseModel;
use App\Series;
use App\Episode;

class SeriesCategory extends BaseModel
{
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
