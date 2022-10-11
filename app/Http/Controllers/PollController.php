<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitPollAnswerRequest;
use App\Models\Poll;
use App\Models\PollSubmission;
use Illuminate\Http\Request;

class PollController extends Controller
{
    public function index(Request $request)
    {
        // TODO
    }

    public function submit(SubmitPollAnswerRequest $request, Poll $poll)
    {
        tap($poll->submissions()->make(), static function (PollSubmission $submission) use ($request) {
            $submission->answer()->associate($request->answer());
            $submission->save();
        });

        return back();
    }
}
