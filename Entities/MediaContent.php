<?php

namespace Modules\MediaLibrary\Entities;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class MediaContent extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['title'];
}
