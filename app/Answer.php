<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BaseModel;
use App\QuestionCategory;

class Answer extends BaseModel
{
    public static $folder = 'cms.answers';

    public static $forms = 'cms.answers.forms';

    protected $fillable = [
      'youtube_id',
    ];

    public function categories()
    {
      return $this->belongsToMany(QuestionCategory::class);
    }
}
