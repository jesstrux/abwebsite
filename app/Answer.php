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

    public function questionCategories()
    {
      return $this->belongsToMany(QuestionCategory::class);
    }
}
