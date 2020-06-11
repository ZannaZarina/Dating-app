<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditProfilePictureController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();

        return view('picture', [
            'user' => $user
        ]);
    }
}
