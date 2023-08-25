<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fichier extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sujet()
    {
         return $this->belongsTo('App\Models\Sujet');
    }

    public function commentaire()
     {
         return $this->belongsTo('App\Models\Commentaire');
     }
}
