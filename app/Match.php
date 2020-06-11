<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = [
        'match_with'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
