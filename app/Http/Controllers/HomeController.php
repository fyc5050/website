<?php

namespace App\Http\Controllers;

use App\Http\Resources\ZeurMeisterResource;
use App\Models\User;
use App\Models\ZeurMeister;
use Inertia\Response;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Inertia\Response
     */
    public function __invoke(): Response
    {
        return inertia('Home', [
            'zeurMeister' => fn () => tap(ZeurMeister::current(),
                fn ($zeurMeister) => !is_null($zeurMeister) ? ZeurMeisterResource::make($zeurMeister) : null),

            'desCounts' => fn () => User::all(['name', 'des_count']),
        ]);
    }
}
