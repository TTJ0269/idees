<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\Profil;
use App\Models\Sujet;
use App\Models\User;

class SujetController extends Controller
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
     // Afficher les types utilisateurs
     public function index()
     {
       try
       {
            $sujets = Sujet::select('*')->get();

            return view('sujets.index', compact('sujets'));
        }
        catch(\Exception $exception)
       {
           return redirect('erreur')->with('messageerreur',$exception->getMessage());
       }
     }

       /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */

     public function create()
     {
       try
       {
          $sujet = new Sujet();

          return view('sujets.create',compact('sujet'));
        }
        catch(\Exception $exception)
       {
           return redirect('erreur')->with('messageerreur',$exception->getMessage());
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
       try
       {
          $libelle = request('libelle');

          $sujet = Sujet::create([
            'libelle'=> request('libelle'),
         ]);

          return redirect('sujets')->with('messagesuccess', 'Sujet bien ajouté.');
      }
        catch(\Exception $exception)
      {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
     }

      /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */

     public function show(Sujet $sujet)
     {
       try
        {
          return view('sujets.show',compact('sujet'));
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

     public function edit(Sujet $sujet)
     {
        try
        {
          return view('sujets.edit', compact('sujet'));
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

     public function update(Sujet $sujet)
     {
       try
       {
          $libelle = request('libelle');

          $sujet->update([
            'libelle'=> request('libelle'),
         ]);

          return redirect('sujets')->with('messagesuccess', 'Sujet bien mise à jour.');
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

     public function destroy(Sujet $sujet)
     {
        try
        {
            if(DB::table('rattachers')->where('rattachers.sujet_id','=',$sujet->id)->doesntExist())
            {
              $sujet->delete();

              return redirect('sujets')->with('messagealert','Suppression éffectuée');
            }

            return redirect('sujets')->with('messagealert','Ce sujet est référencé dans une autre table');
        }
          catch(\Exception $exception)
        {
            return redirect('erreur');
        }

     }
}
