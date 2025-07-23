<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Formation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItems extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class, 'formation_id');
    }
}
