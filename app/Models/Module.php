<?php

namespace App\Models;

use App\Models\Chapitre;
use App\Models\Formation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;

    protected $guarded = [];

     public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    public function chapitres()
    {
        return $this->hasMany(Chapitre::class);
    }
}
