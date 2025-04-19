<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'city', 'province', 'postal_code', 'email', 'director_email', 'director_name', 'erasmus_coordinator', 'phone', 'badge'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
