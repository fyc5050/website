<?php

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
        Schema::table('quotes', function (Blueprint $table) {
            $table->boolean('is_hidden')
                ->default(false)
                ->after('said_by');
        });
    }
};
