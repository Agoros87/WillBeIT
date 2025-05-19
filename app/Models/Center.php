<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Center extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'city', 'province', 'postal_code', 'email', 'director_email', 'director_name', 'erasmus_coordinator', 'phone', 'badge', 'status'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function posts(): HasManyThrough
    {
        return $this->hasManyThrough(Post::class, User::class);
    }
}
