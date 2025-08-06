<?php

namespace App\Models;

use App\Models\Formateur;
use App\Models\TypeProduitDigital;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProduitDigital extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'produits_digitaux';



    public function type()
    {
        return $this->belongsTo(TypeProduitDigital::class, 'type_produit_digital_id');
    }

    public function formateur()
    {
        return $this->belongsTo(Formateur::class);
    }
}
