<?php

use App\Models\User;
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
        Schema::create('des_mutations', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();

            $table->foreignIdFor(User::class, 'created_by_id')
                ->nullable()
                ->constrained()
                ->on('users')
                ->nullOnDelete();

            $table->foreignIdFor(User::class, 'status_updated_by_id')
                ->nullable()
                ->constrained()
                ->on('users')
                ->nullOnDelete();

            $table->string('state');
            $table->integer('mutation');
            $table->integer('count_after')->nullable();
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
        Schema::dropIfExists('des_mutations');
    }
};
