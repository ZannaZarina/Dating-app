<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Reaction extends Model
{
    protected $fillable = [
        'reaction_to', 'reaction'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeLikedThem($query)
    {
        $query->where('reaction', 'like');
    }

    public function scopeLikedMe($query)
    {
        $query->where('reaction', 'like');
    }

}
