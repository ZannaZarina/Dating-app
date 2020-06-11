<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateUserProfileController extends Controller
{
    public function __invoke(Request $request)
    {
        /** @var User $user */
        $user = auth()->user();

        $user->update([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'age' => $request->get('age'),
            'location' => $request->get('location'),
        ]);

        return redirect()
            ->back()
            ->with('status', 'Some details in Your profile are changed');
    }

}
