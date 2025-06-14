<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Podcast extends Model
{
    use HasFactory;

    public function getRouteKeyName() // Me ahorro poner en las rutas {modelo:slug} para que sea por slug en lugar de id
    {
        return 'slug';
    }
    protected $fillable = ['user_id', 'title', 'description', 'slug', 'podcast_path' , 'image_path', 'status', 'created_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function favorites()
    {
        return $this->morphToMany(User::class, 'favoritable', 'favorites')->withTimestamps();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

}
