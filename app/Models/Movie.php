<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'year', 'poster'];

    /**
     * get the reviews for the movie
     */
    public function reviews() : HasMany
    {
        return $this->hasMany(Review::class);
    }
}
