<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BaseModel;
use App\QuestionCategory;
use App\Follower;

class Question extends BaseModel
{
    protected $fillable = [
      'question_category_id', 'follower_id', 'question',
    ];

    public function category()
    {
      return $this->belongsTo(QuestionCategory::class);
    }

    public function follower()
    {
      return $this->belongsTo(Follower::class);
    }
}
