<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rattacher()
    {
        return $this->belongsTo('App\Models\Rattacher');
    }

    public function fichiers()
    {
        return $this->hasMany('App\Models\Fichier');
    }

}
