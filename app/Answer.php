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
      'youtube_id', 'title',
    ];

    public function questionCategories()
    {
      return $this->belongsToMany(QuestionCategory::class);
    }

    public function getCategoriesAttribute()
    {
      $categories = $this->questionCategories()->pluck('name')->toArray();
      return implode(", ", $categories);
    }

    public function getCategoriesSnippetAttribute()
    {
      return str_limit($this->getCategoriesAttribute(), 20);
    }

    public function getTitleSnippetAttribute()
    {
      return str_limit($this->title, 25);
    }
}
