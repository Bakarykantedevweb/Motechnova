<?php

use App\Models\TypeProduitDigital;
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
        Schema::create('produits_digitaux', function (Blueprint $table) {
            $table->id();
            $table->foreignId('formateur_id')->constrained('formateurs'); // ou users si tes formateurs sont dans users
            $table->foreignIdFor(TypeProduitDigital::class)->constrained()->onDelete('cascade');
            $table->string('titre');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('fichier'); // chemin vers le fichier (stockage local ou S3)
            $table->decimal('prix', 10, 2)->default(0);
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits_digitaux');
    }
};
