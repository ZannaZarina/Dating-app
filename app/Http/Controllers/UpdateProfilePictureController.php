<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateProfilePictureController extends Controller
{
    public function __invoke(Request $request)
    {
        /** @var User $user */
        $user = auth()->user();

        Storage::delete($user->profile_picture);

        $user->update([
            'profile_picture' => $request
                ->file('picture')
                ->store('profilePictures')
        ]);

        return redirect()
            ->back()
            ->with('status', 'Your profile photo is changed');
    }
}
