<?php

namespace App\Http\Controllers;

use App\Mail\MatchEmail;use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MatchController extends Controller
{
    public function matchHistory()
    {
        /** @var User $authUser */
        $authUser = auth()->user();

        $userLikedThem = $authUser
            ->reactions()
            ->likedThem()
            ->pluck('reaction_to');

        $theyLikedMe = $authUser
            ->reactionsOnMe()
            ->likedMe()
            ->pluck('user_id');

        $reactionsBothSides = $userLikedThem->merge($theyLikedMe);
        $findMatchedUsers = $reactionsBothSides->duplicates();

        $matchWith = $authUser
            ->whereIn('id', $findMatchedUsers)
            ->get();

        if(!empty($matchWith))
        {
            foreach ($matchWith as $user)
            {
                $authUser->matches()->updateOrCreate([
                    'match_with' => $user->id
                ]);

                Mail::to($user->email)
                    ->queue(new MatchEmail($authUser, $user));

                Mail::to($authUser->email)
                    ->queue(new MatchEmail($user, $authUser));
            }
        }

        return view('match-history', [
            'matchWith' => $matchWith
        ]);
    }
}
