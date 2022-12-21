<?php

namespace App\Http\Controllers;

use App\Http\Resources\ZeurMeisterResource;
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
            'zeurMeister' => fn () => ZeurMeisterResource::make(
                ZeurMeister::current()
            ),
        ]);
    }
}
