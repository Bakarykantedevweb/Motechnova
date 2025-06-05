<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->timestamps();
        });
        DB::table('categories')->insert([
            [
                'nom' => 'Programming',
            ],
            [
                'nom' => 'Web Development',
            ],
            [
                'nom' => 'Artificial Intelligence',
            ],
            [
                'nom' => 'Data Science',
            ],
            [
                'nom' => 'UI / UX Design',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
