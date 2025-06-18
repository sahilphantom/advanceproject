<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
       protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    // Country → Posts through Users
    public function posts()
    {
        return $this->hasManyThrough(Post::class, User::class);
    }
}
