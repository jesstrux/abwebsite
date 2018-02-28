<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Alsofronie\Uuid\UuidModelTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class BaseModel extends Model implements HasMedia
{
    use SoftDeletes, UuidModelTrait, HasMediaTrait;
}
