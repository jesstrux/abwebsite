<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BaseModel;
use App\Question;
use App\Answer;

class QuestionCategory extends BaseModel
{
    public static $folder = 'cms.question_categories';

    public static $forms = 'cms.question_categories.forms';

    protected $fillable = [
      'name',
    ];

    public function questions()
    {
      return $this->hasMany(Question::class);
    }

    public function answers()
    {
      return $this->belongsToMany(Answer::class)->withTimestamps();
    }
}
