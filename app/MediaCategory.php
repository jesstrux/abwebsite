<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BaseModel;
use App\Media;

class MediaCategory extends BaseModel
{
    protected $fillable = [
      'name',
    ];

    public function media()
    {
      return $this->hasMany(Media::class);
    }
}
