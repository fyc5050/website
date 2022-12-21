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
        $zeurMeisters = DB::table('zeur_meisters')
            ->get();

        $users = DB::table('users')
            ->whereIn('id', $zeurMeisters->map(fn ($row) => $row->user_id)->unique()->toArray())
            ->get();

        Schema::table('zeur_meisters', function (Blueprint $table) {
            $table->dropForeignIdFor(User::class);
            $table->dropColumn('user_id');

            $table->string('name')->default('')->after('uuid');
        });

        $zeurMeisters->each(function ($row) use ($users) {
            DB::table('zeur_meisters')
                ->where('id', $row->id)
                ->update([
                    'name' => $users->where('id', $row->user_id)->first()->name,
                ]);
        });
    }
};
