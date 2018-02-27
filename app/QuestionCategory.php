<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BaseModel;
use App\Question;
use App\Answer;

class QuestionCategory extends BaseModel
{
    protected $fillable = [
      'name',
    ];

    public function questions()
    {
      return $this->hasMany(Question::class);
    }

    public function answers()
    {
      return $this->belongsToMany(Answer::class);
    }
}
