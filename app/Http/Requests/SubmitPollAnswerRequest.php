<?php

namespace App\Http\Requests;

use App\Models\Poll;
use App\Models\PollAnswer;
use App\Models\PollSubmission;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

/**
 * @property-read string $answer_id
 */
class SubmitPollAnswerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        /** @var \App\Models\Poll $poll */
        $poll = $this->route('poll');

        return Gate::allows('create', [PollSubmission::class, $poll]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'answer_id' => ['required', 'uuid'],
        ];
    }

    public function poll(): Poll
    {
        /** @var Poll */
        return $this->route('poll');
    }

    public function answer(): PollAnswer
    {
        return once(fn () => $this->poll()->answers()->where('uuid', $this->answer_id)->firstOrFail());
    }
}
