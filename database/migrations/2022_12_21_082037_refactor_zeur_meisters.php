<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        // Save current zeur meister date into memory
        $zeurMeisters = DB::table('zeur_meisters')
            ->get();

        $users = DB::table('users')
            ->whereIn('id', $zeurMeisters->map(fn ($row) => $row->user_id)->unique()->toArray())
            ->get();

        // Alter the table
        Schema::table('zeur_meisters', function (Blueprint $table) {
            $table->dropForeignIdFor(User::class);
            $table->dropColumn('user_id', 'week_number', 'year_number');

            $table->string('name')
                ->default('')
                ->after('uuid');

            $table->date('starts_at')
                ->default('2023-01-11')
                ->after('name');

            $table->date('ends_at')
                ->default('2023-01-11')
                ->after('starts_at');
        });

        // Set new values
        $zeurMeisters->each(function ($row) use ($users) {
            $startsAt = now()
                ->year($row->year_number)
                ->week($row->week_number)
                ->startOfWeek();

            $endsAt = $startsAt
                ->clone()
                ->endOfWeek();

            DB::table('zeur_meisters')
                ->where('id', $row->id)
                ->update([
                    'name' => $users->where('id', $row->user_id)->first()->name,
                    'starts_at' => $startsAt,
                    'ends_at' => $endsAt,
                ]);
        });
    }
};
