<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BaseModel;
use App\QuestionCategory;

class Answer extends BaseModel
{
    protected $fillable = ['youtube_url',];

    public function categories()
    {
      return $this->belongsToMany(QuestionCategory::class);
    }
}
