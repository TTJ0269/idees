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

class CommentaireController extends Controller
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
            $user_id = (Auth::user()->id);
            $profil_id = (Auth::user()->profil_id);

            $profil = DB::table('profils')->where('profils.id','=',$profil_id)
            ->select('profils.*')->first();

            /*if($profil->libelle == 'Administrateur')
            {
                $profils = Commentaire::select('*')->get();

                $commentaires = DB::table('rattachers')
                ->join('commentaires','','=','commentaires.user_id')
                ->join('activite_saisies','activite_saisies.id','=','commentaires.activite_saisie_id')
                ->select('commentaires.*','activite_saisies.TitreActiviteSaisie')
                ->orderBy('commentaires.id','DESC')
                ->get();


            }*/

            $sujets = Sujet::select('*')->get();

            return view('commentaires.index', compact('sujets'));
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

     public function create(Sujet $sujet)
     {
         try
         {
            $commentaire = new Commentaire();

            $sujet_id = $sujet->id;
            $sujet_libelle = $sujet->libelle;

            if (Rattacher::where('sujet_id','=',$sujet->id)
                ->where('user_id','=',Auth::user()->id)
                ->select('id')->doesntExist()) {

                return back()->with('messagealert', 'Accèss refusé.');
            } else {

                $rattacher_id = Rattacher::where('sujet_id','=',$sujet->id)
                ->where('user_id','=',Auth::user()->id)
                ->select('*')->first()->id;

                $commentaires_show = DB::table('users')
                ->join('rattachers','users.id','=','rattachers.user_id')
                ->join('commentaires','rattachers.id','=','commentaires.rattacher_id')
                ->where('rattachers.sujet_id','=',$sujet_id)
                ->select('commentaires.*','users.id as id_user','users.nom','users.prenom','users.imageuser')
                ->orderBy('commentaires.id','ASC')
                ->get();

                $fichiers = Fichier::where('sujet_id','=',$sujet->id)->select('*')->get();

                //$commentaires_show = Commentaire::select('*')->where('rattacher_id','=',$rattacher_id)->get();

                return view('commentaires.create',compact('commentaire','sujet_id','sujet_libelle','commentaires_show','rattacher_id','fichiers'));

            }
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
         try
         {
            $users_id = Auth::user()->id;
            $rattacher_id = request('rattacher_id');
            $sujet_id = request('sujet_id');

            $commentaire = Commentaire::create([
                'message'=> request('message'),
                'date'=> now(),
                'rattacher_id'=> $rattacher_id,
                'responsable_id' => $users_id
             ]);

            return redirect('commentaires/create/'. $sujet_id)->with('messagesuccess', 'Commentaire bien envoyé.');
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

     public function show(Commentaire $commentaire)
     {
         try
         {
          return view('commentaires.show',compact('commentaire'));
         }
         catch(\Exception $exception)
         {
            return redirect('erreur');
         }
     }

     public function ShowNotification(Commentaire $commentaire , DatabaseNotification $notification)
     {
        try
        {
           $notification->markAsRead();

           return view('commentaires.show',compact('commentaire'));
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

     public function edit(Commentaire $commentaire)
     {
         try
         {
            return view('commentaires.edit', compact('commentaire'));
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

     public function update()
     {
         try
         {
            $rattacher_id = request('rattacher_id');
            $sujet_id = request('sujet_id');
            $commentaire_id = request('commentaire_id');
            $message = request('message');

            //dd($rattacher_id, $sujet_id, $commentaire_id, $message);

            DB::table('commentaires')->where('id','=',$commentaire_id)->update(['message' => $message]);

            return redirect('commentaires/create/'. $sujet_id)->with('messagesuccess', 'Commentaire bien modifié.');
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

     public function destroy(Commentaire $commentaire)
     {
         try
         {
            $commentaire->delete();

            return back()->with('messagealert', 'Suppression éffectuée.');
         }
        catch(\Exception $exception)
       {
           return redirect('erreur');
       }
     }

}
