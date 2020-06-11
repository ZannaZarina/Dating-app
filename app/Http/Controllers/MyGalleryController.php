<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class MyGalleryController extends Controller
{
    public function __invoke(User $user)
    {
//        $user = auth()->user();
//
//        return view('gallery', [
//            'user' => $user
//        ]);

        $pictures = $user->pictures()->get();

        return view('gallery', [
            'user' => $user,
            'pictures' => $pictures
        ]);


    }
}
