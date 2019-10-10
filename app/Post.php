<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'description'];

    public function post_images()
    {
        return $this->hasMany(PostImage::class);
    }
}
