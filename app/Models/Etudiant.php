<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Etudiant extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    // 🔁 Relation : panier
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    // 🔁 Relation : commandes
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // 🔁 Relation : formations suivies
    public function formations()
    {
        return $this->belongsToMany(Formation::class, 'etudiant_formations')
                    ->withPivot('acces_donne_le')
                    ->withTimestamps();
    }
}