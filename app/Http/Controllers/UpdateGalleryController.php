<?php

namespace App\Http\Controllers;

use App\Picture;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateGalleryController extends Controller
{
    public function __invoke(Request $request)
    {
        /** @var User $user */
        $user = auth()->user();

        $files = $request->file('picture');

        foreach ($files as $file)
        {
            $user->pictures()->updateOrCreate([
                'location' =>$file->store('pictures')
            ]);
        }

        return redirect()
            ->back()
            ->with('status', 'You added new photo to Your gallery!');
    }
}
