<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        'video_id',
        'podcasts_id',
        'user_id',
        'title',
        'slug',
        'body',
        'image',
    ];

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    public function podcast()
    {
        return $this->belongsTo(Podcast::class, 'podcasts_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function favorites()
    {
        return $this->morphToMany(User::class, 'favoritable', 'favorites')->withTimestamps();
    }


}
