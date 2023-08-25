<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\Profil;
use App\Models\User;
use App\Models\Sujet;
use App\Models\Rattacher;

class RattacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
             /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
     // Afficher les activites appartenants a la personne qui s'est connecter
     public function index()
     {
        $this->authorize('admin', Profil::class);
       try
       {
         $rattachers = Rattacher::select('*')->orderBy('id','DESC')->get();

         return view('rattachers.index', compact('rattachers'));
       }
      catch(\Exception $exception)
      {
          return redirect('erreur');
      }

     }

       /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */

     public function create()
     {
        $this->authorize('admin', Profil::class);
       try
       {
         $rattacher = new Rattacher();
         $sujets = Sujet::select('*')->get();
         $users = User::select('*')->get();

         return view('rattachers.create',compact('rattacher','users','sujets'));

        }
        catch(\Exception $exception)
        {
            return redirect('erreur');
        }
     }


       /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */

     public function store()
     {
        $this->authorize('admin', Profil::class);

       try
       {
            $this->creation();

            return redirect('rattachers/create')->with('messagesuccess', 'Informations bien enregistrées.');
       }
        catch(\Exception $exception)
        {
            return redirect('erreur');
        }
     }


      /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */

     public function show(Rattacher $rattacher)
     {
        $this->authorize('admin', Profil::class);
        try
        {
           return view('rattachers.show',compact('rattacher'));
        }
        catch(\Exception $exception)
        {
            return redirect('erreur');
        }
     }

    /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */

     public function edit(Rattacher $rattacher)
     {
        $this->authorize('admin', Profil::class);
       try
       {
         $users = User::select('*')->get();
         $sujets = Sujet::select('*')->get();

        return view('rattachers.edit', compact('rattachers','users','sujets'));
       }
      catch(\Exception $exception)
      {
          return redirect('erreur');
      }
     }

        /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */

     public function update(Rattacher $rattacher)
     {
        $this->authorize('admin', Profil::class);
        try
        {
            //return redirect('rattachers/' . $rattacher->id)->with('message', 'Informations bien mise à jour.');
        }
        catch(\Exception $exception)
        {
            return redirect('erreur');
        }

     }

      /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */

     public function destroy(Rattacher $rattacher)
     {
        $this->authorize('admin', Profil::class);
       try
       {
            $rattacher->delete();

            return redirect('rattachers')->with('messagealert','Suppression éffectuée');
      }
      catch(\Exception $exception)
      {
          return redirect('erreur');
      }

     }

     private function creation()
     {
        $sujet_id = request('sujet_id');

        $nbre = count(request('user_id'));

        for ($i=0; $i < $nbre; $i++) {

            if (Rattacher::where('user_id','=',request('user_id')[$i])
                ->where('sujet_id','=',$sujet_id)->select('id')->doesntExist()) {

                    Rattacher::create([
                        'user_id' => request('user_id')[$i],
                        'sujet_id'=> $sujet_id,
                        'responsable_id'=> Auth::user()->id,
                        'date'=> now(),
                    ]);
            }
        }
     }
}
