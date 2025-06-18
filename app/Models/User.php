<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
      use HasFactory;
    protected $fillable = ['name', 'email', 'country_id'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
