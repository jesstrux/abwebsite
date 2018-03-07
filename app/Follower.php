<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Question;

class Follower extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $fillable = [
      'name', 'email',
    ];

    public function questions()
    {
      return $this->hasMany(Question::class);
    }
}
