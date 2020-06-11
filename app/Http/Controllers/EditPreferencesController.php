<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditPreferencesController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();

        return view('preferences', [
            'user' => $user
        ]);
    }
}
