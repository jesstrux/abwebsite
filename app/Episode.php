<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BaseModel;
use App\Media;

class Episode extends BaseModel
{
    protected $fillable = [
      'image_url', 'youtube_url', 'title',
      'description', 'date_aired', 'media_id',
    ];

    public function media()
    {
      return $this->belongsTo(Media::class);
    }
}
