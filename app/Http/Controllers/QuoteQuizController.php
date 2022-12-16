<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuoteQuizQuestion;
use App\Http\Resources\QuoteQuizUserResource;
use App\Models\Quote;
use App\Models\User;
use Inertia\Response;

class QuoteQuizController extends Controller
{
    public function index(): Response
    {
        return inertia('QuoteQuiz', [
            'quotes' => QuoteQuizQuestion::collection(
                Quote::shown()
                    ->get()
            ),
        ]);
    }
}
