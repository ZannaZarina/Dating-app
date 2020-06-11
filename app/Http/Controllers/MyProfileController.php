<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyProfileController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();

        return view('profile', [
            'user' => $user
        ]);
    }
}
