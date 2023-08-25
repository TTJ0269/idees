<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rattacher extends Model
{
    use HasFactory;

    protected $guarded = [];

     public function user()
     {
        return $this->belongsTo('App\Models\User');
     }

     public function sujet()
     {
        return $this->belongsTo('App\Models\Sujet');
     }

     public function commentaires()
     {
        return $this->hasMany('App\Models\Commentaire');
     }

}
