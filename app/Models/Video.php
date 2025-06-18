<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['title', 'url', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
