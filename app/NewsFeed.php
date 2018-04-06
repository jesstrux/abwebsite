<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsFeed extends BaseModel
{
  public static $folder = 'cms.news_feeds';

  public static $forms = 'cms.news_feeds.forms';

  protected $fillable = [
    'youtube_id', 'title',
  ];

  public function getTitleSnippetAttribute()
  {
    return str_limit($this->title, 25);
  }
}
