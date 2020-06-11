<?php

namespace App\Http\Controllers;

use App\Http\Requests\MinMaxAge;
use App\User;
use Illuminate\Http\Request;

class UpdatePreferencesController extends Controller
{
    public function __invoke(MinMaxAge $request)
    {
        /** @var User $user */
        $user = auth()->user();

        $validated = $request->validated();

        if ($request->get('partner_gender') != null)
        {
            $user->update([
                'partner_gender' => $request->get('partner_gender')
            ]);
        }

        $user->update([
            'min_age' => $request->get('min_age'),
            'max_age' => $request->get('max_age')
        ]);

        return redirect()
            ->back()
            ->with('status', 'You changed parameters of searching');

    }

}
