<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\Profil;
use App\Models\User;

class SaveController extends Controller
{
    public function save()
    {
        DB::table('profils')->insert([
            'libelle' => 'Administrateur',
        ]);

        DB::table('users')->insert([
            'name' => 'Admin Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make(123456789),
            'created_at' => now(),
            'updated_at' => now(),
            'nom' => 'Admin',
            'prenom' => 'user',
            'tel' => null,
            'imageuser' => null,
            'profil_id' => Profil::where('libelle','=','Administrateur')->select('id')->first()->id,
        ]);
    }
}
