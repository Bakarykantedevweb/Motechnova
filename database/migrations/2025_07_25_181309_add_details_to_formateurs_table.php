<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('formateurs', function (Blueprint $table) {
            $table->string('pays')->nullable();
            $table->string('ville')->nullable();
            $table->text('description')->nullable();
            $table->string('specialites')->nullable(); // Peut contenir "Frontend, DevOps"
        });
    }

    public function down(): void
    {
        Schema::table('formateurs', function (Blueprint $table) {
            $table->dropColumn(['pays', 'ville', 'description', 'specialites']);
        });
    }
};
