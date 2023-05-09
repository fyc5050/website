<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuoteResource;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class QuoteController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return QuoteResource::collection(
            Quote::all()
        );
    }
}
