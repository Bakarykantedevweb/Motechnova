<?php

use App\Models\Categorie;
use App\Models\Formateur;
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
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description');
            $table->text('large_description');
            $table->integer('prix_original')->nullable();
            $table->integer('prix_promotion')->nullable();
            $table->string('image');
            $table->string('niveau');
            $table->string('payante');
            $table->date('date_creation');
            $table->integer('status')->default(0);
            $table->string('video_presentation')->nullable();
            $table->foreignIdFor(Formateur::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Categorie::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
