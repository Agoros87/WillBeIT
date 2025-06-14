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
        'slug',
        'title',
        'body',
        'image',
        'status',
    ];
    public function getRouteKeyName() // Me ahorro poner en las rutas {modelo:slug} para que sea por slug en lugar de id
    {
        return 'slug';
    }

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
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function favorites()
    {
        return $this->morphToMany(User::class, 'favoritable', 'favorites')->withTimestamps();
    }

    public function likedByUsers()
    {
        return $this->belongsToMany(User::class, 'post_user_likes')->withTimestamps();
    }

    public function isLikedBy(User $user)
    {
        return $this->likedByUsers->contains($user);
    }

}
