<?php

namespace App\Models;

use App\Models\OrderItems;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    // 🔁 Items liés à la commande
    public function orderItems()
    {
        return $this->hasMany(OrderItems::class);
    }

    // 🔁 Transaction liée à cette commande
    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    // 🔁 Étudiant propriétaire de la commande
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
}