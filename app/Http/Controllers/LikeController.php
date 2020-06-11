<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likeHistory()
    {
        /** @var User $user */
        $user = auth()->user();

        $userLikedThem = $user
            ->reactions()
            ->likedThem()
            ->get('reaction_to'); //[{"reaction_to":137},{"reaction_to":43},{"reaction_to":15},{"reaction_to":7}]

        $likesTo = $user
            ->whereIn('id', $userLikedThem)
            ->get();//[{"id":7, "first_name":"Watson", "age":30, ... },{},{},{}]

        $theyLikedMe = $user
            ->reactionsOnMe()
            ->likedMe()
            ->get('user_id');

        $likesFrom = $user
            ->whereIn('id', $theyLikedMe)
            ->get();

        return view('like-history', [
            'likesTo' => $likesTo,
            'likesFrom' => $likesFrom
        ]);
    }
}
