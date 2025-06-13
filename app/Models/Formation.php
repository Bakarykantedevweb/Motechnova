<?php

namespace App\Models;

use App\Models\Module;
use App\Models\Categorie;
use App\Models\Formateur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function formateur()
    {
        return $this->belongsTo(Formateur::class);
    }
}
