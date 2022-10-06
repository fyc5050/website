<?php

use App\Models\Poll;
use App\Models\PollAnswer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('poll_submissions', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignIdFor(Poll::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(PollAnswer::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('poll_submissions');
    }
};
