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
use App\Models\Commentaire;
use App\Models\Rattacher;
use App\Models\Fichier;

class FichierController extends Controller
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
     //
     public function index()
     {
       try
       {
          $user_id = (Auth::user()->id);
          $profil_id = (Auth::user()->profil_id);


          $profil = DB::table('profils')->where('id','=',$profil_id)->select('*')->first();

          if($profil->libelle == 'Administrateur')
          {
            $fichiers = DB::table('sujets')
            ->join('fichiers','sujets.id','=','fichiers.sujet_id')
            ->select('fichiers.*','sujets.libelle')
            ->orderBy('fichiers.id','DESC')
            ->get();

            return view('fichiers.index', compact('fichiers'));
          }
          else
          {
            $fichiers = DB::table('sujets')
            ->join('fichiers','sujets.id','=','fichiers.sujet_id')
            ->where('fichiers.responsable_id','=',$user_id)
            ->select('fichiers.*','sujets.libelle')
            ->orderBy('fichiers.id','DESC')
            ->get();

            return view('fichiers.index', compact('fichiers'));
          }
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

     public function create($sujet_id,)
     {
        try
        {
            $sujet = Sujet::select('*')->where('id','=',$sujet_id)->first();
            $fichier = new Fichier();

            return view('fichiers.create',compact('fichier','sujet'));
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

     public function store(Request  $request)
     {
       /*try
       {*/
        if($request->file('urlfichier') == null)
        {
          return back()->with('messagealert', 'Choisissez un fichier.');
        }
        elseif (request('libellefichier') == null) {
          return back()->with('messagealert', 'Veuillez donner un nom au fichier.');
        }
        else
        {
            $rattacher_id = Rattacher::where('sujet_id','=',request('sujet_id'))
                ->where('user_id','=',Auth::user()->id)
                ->select('*')->first()->id;

            $commentaire = Commentaire::create([
                'message'=> 'lien fichier',
                'date'=> now(),
                'rattacher_id'=> $rattacher_id,
                'responsable_id' => Auth::user()->id,
             ]);

          $fichiers = new Fichier;

          $fichiers->libellefichier=request('libellefichier');
          $fichiers->sujet_id=request('sujet_id');
          $fichiers->commentaire_id=$commentaire->id;
          $fichiers->responsable_id=Auth::user()->id;
          if($request->file('urlfichier'))
          {
              $file=$request->file('urlfichier');
              $filename=time().'.'.$file->getClientOriginalExtension();
              $request->urlfichier->move('storage/fichier/', $filename);

              $fichiers->urlfichier=$filename;
          }
          $fichiers->save();

          return redirect('commentaires/create/'. request('sujet_id'))->with('messagesuccess', 'Fichier bien ajouté.');
        }

     /* }
      catch(\Exception $exception)
      {
          return redirect('erreur');
      }*/
     }

      /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */

     public function show(Fichier $fichier)
     {
        try
        {
          return view('fichiers.show',compact('fichier'));
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

     public function edit(Fichier $fichier)
     {
        try
        {
         return view('fichiers.edit', compact('fichier'));
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

     public function update(Fichier $fichier)
     {
      try
      {
        $fichier->update([
              'libellefichier'=> request('libellefichier'),
              'urlfichier'=> request('urlfichier'),
              'sujet_id'=> request('sujet_id'),
              'commentaire_id'=> request('commentaire_id'),
          ]);

          return redirect('fichiers/' . $fichier->id);
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

     public function destroy(Fichier $fichier)
     {
       try
       {
            $fichier->delete();

            return redirect('fichiers')->with('messagealert', 'Suppression effectuée avec succès.');
      }
      catch(\Exception $exception)
      {
         return redirect('erreur');
      }
     }

     public function Telecharger($file)
     {
        try
        {
           return response()->download('storage/fichier/'.$file);
        }
        catch(\Exception $exception)
        {
           return redirect('erreur');
        }
     }
}
