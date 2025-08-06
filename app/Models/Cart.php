<?php

namespace App\Models;

use App\Models\ProduitDigital;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    public function produitDigital()
    {
        return $this->belongsTo(ProduitDigital::class);
    }
}
