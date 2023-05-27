<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Response;

class AboutUsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function __invoke(Request $request): Response
    {
        return inertia('AboutUs', [
            'desCounts' => static fn () =>
                User::all(['name', 'des_count'])->mapWithKeys(static fn (User $user) => [$user->name => $user->des_count]),
        ]);
    }
}
