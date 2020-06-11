<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'age',
        'gender',
        'location',
        'email',
        'password',
        'profile_picture',
        'min_age',
        'max_age',
        'partner_gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function reactions()
    {
        return $this->hasMany(Reaction::class); // user_id , id
    }

    public function reactionsOnMe()
    {
        return $this->hasMany(Reaction::class, 'reaction_to', 'id');
    }

    public function matches()
    {
        return $this->hasMany(Match::class);
    }

    public function getPicture(): string
    {
        return Storage::exists($this->profile_picture) ? Storage::url($this->profile_picture) : $this->profile_picture;
    }

    public function scopePartnerParameters($query)
    {
        $query->where([
            ['id', '<>', auth()->user()->id],
            ['min_age', '<=', auth()->user()->age],
            ['max_age', '>=', auth()->user()->age],
        ])
            ->whereBetween('age', [auth()->user()->min_age, auth()->user()->max_age]);
    }

    public function scopeOneGender($query)
    {
        $query->where([
            ['gender', auth()->user()->partner_gender],
            ['partner_gender', auth()->user()->gender]
        ]);
    }

    public function scopeTwoGenders($query)
    {
        $query->whereIn('partner_gender', [auth()->user()->gender, 'both']);
    }

    public function scopeFilterReaction($query)
    {
        $reactions = auth()->user()->reactions()->pluck('reaction_to');
        $query->where('id', '<>', auth()->user()->id)
            ->whereNotIn('id', $reactions->all());
    }


}
