<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sujet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rattachers()
    {
        return $this->hasMany('App\Models\Rattacher');
    }

    public function fichiers()
    {
        return $this->hasMany('App\Models\Fichier');
    }
}
