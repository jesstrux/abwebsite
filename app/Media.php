<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BaseModel;
use App\MediaCategory;
use App\Episode;

class Media extends BaseModel
{
    protected $fillable = [
      'title', 'media_category_id', 'air_time',
      'day', 'description', 'channel',
    ];

    public function category()
    {
      return $this->belongsTo(MediaCategory::class);
    }

    public function episodes()
    {
      return $this->hasMany(Episode::class);
    }
}
