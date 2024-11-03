<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['author', 'body'];

    /**
     * Get the movie for which the review was written
     */
    public function movie() : BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }
}
