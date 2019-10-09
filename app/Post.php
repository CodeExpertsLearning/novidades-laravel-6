<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function post_images()
    {
        return $this->hasMany(PostImage::class);
    }
}
