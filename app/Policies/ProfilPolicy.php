<?php

namespace App\Policies;

use App\Models\Profil;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilPolicy
{
    use HandlesAuthorization;


    public function admin()
    {
        try
        {
            if(Profil::where('id',Auth::user()->profil_id)->where('libelle','=','Administrateur')->exists()){return true;}
            return false;
        }
        catch(\Exception $exception)
        {
            return redirect('erreur')->with('messageerreur',$exception->getMessage());
        }
    }

    public function user()
    {
        try
        {
            if(Profil::where('id',Auth::user()->profil_id)->where('libelle','=','Utilisateur')->exists()){return true;}
            return false;
        }
        catch(\Exception $exception)
        {
            return redirect('erreur')->with('messageerreur',$exception->getMessage());
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Profil $profil)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Profil $profil)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Profil $profil)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Profil $profil)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Profil $profil)
    {
        //
    }
}
