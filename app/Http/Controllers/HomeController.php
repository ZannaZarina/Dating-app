<?php

namespace App\Http\Controllers;

use App\Reaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function filteredUsers()
    {
        /** @var User $user */

        if (auth()->user()->partner_gender == 'both') {
            $user = auth()->user()
                ->PartnerParameters()->TwoGenders()
                ->FilterReaction()->inRandomOrder()
                ->first();
        } else {
            $user = auth()->user()
                ->PartnerParameters()->OneGender()
                ->FilterReaction()->inRandomOrder()
                ->first();
        }

        return view('home', [
            'user' => $user
        ]);
    }

    public function like(User $user)
    {
        /** @var User $user */

        auth()->user()->reactions()->create([
            'reaction_to' => $user->id,
            'reaction' => 'like'
        ]);

        return redirect()->back();
    }

    public function dislike(User $user)
    {
        /** @var User $user */

        auth()->user()->reactions()->create([
            'reaction_to' => $user->id,
            'reaction' => 'dislike'
        ]);

        return redirect()->back();
    }

}

