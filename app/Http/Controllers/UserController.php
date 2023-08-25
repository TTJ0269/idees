<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\Profil;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
          $this->middleware('auth');//->except(['index'])
    }
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */

      public function index()
      {
          $this->authorize('admin', Profil::class);
          try
          {
            $user_id = (Auth::user()->id);
            $profil_id = (Auth::user()->profil_id);

              $users = User::select('*')->get();

              return view('users.index', compact('users'));
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
      $this->authorize('admin', Profil::class);
     try
     {
         $profils = Profil::select('*')->get();

          $user = new User();

          return view('users.create',compact('user', 'profils'));
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

   public function store(Request  $request)
   {
      $this->authorize('admin', Profil::class);
     try
     {
          $password = request('nom').'@'.request('prenom');
          $imageuser = null;

          if($request->file('image'))
          {
              $file=$request->file('image');
              $filename=time().'.'.$file->getClientOriginalExtension();
              $request->image->move('storage/image/', $filename);

              $imageuser = $filename;
          }
          
          if(User::where('email','=',request('email'))->select('id')->exists())
          {
              return back()->with('messagealert',"Le mail ".request('email')." existe déjà.");
          }
          else
          {
              $user = User::create([
                  'name'=> request('name'),
                  'email'=> request('email'),
                  'password' => Hash::make($password),
                  'profil_id'=> request('profil_id'),
                  'nom'=> request('nom'),
                  'prenom'=> request('prenom'),
                  'tel'=> request('tel'),
                  'imageuser'=> $imageuser,
              ]);

              return redirect('users')->with('messagesuccess', 'Utilisateur bien ajouté.');
          }

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

   public function show(User $user)
   {
      $this->authorize('admin', Profil::class);
      try
      {
        return view('users.show',compact('user'));
      }
      catch(\Exception $exception)
      {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
   }

  /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function edit(User $user)
   {
      $this->authorize('admin', Profil::class);
      try
      {
        $profils = Profil::all();

        return view('users.edit', compact('user', 'profils'));
      }
      catch(\Exception $exception)
      {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
   }

      /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function update(User $user)
   {
      $this->authorize('admin', Profil::class);
     try
     {
          if(request('email') != null && $user->email != request('email') && User::where('email','=',request('email'))->select('id')->exists())
          {
              return back()->with('messagealert',"Le mail ".request('email')." existe déjà.");
          }
          else
          {
              $user->update([
                  'name'=> request('name'),
                  'nom'=> request('nom'),
                  'prenom'=> request('prenom'),
                  'email'=> request('email'),
                  'profil_id'=> request('profil_id'),
                  'tel'=> request('tel'),
                  //'password'=> Hash::make(135792468),
                  ]);

              return redirect('users/' . $user->id)->with('messagesuccess', 'Données bien mises à jour.');;
          }

      }
      catch(\Exception $exception)
      {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function destroy(User $user)
   {
     $this->authorize('admin', User::class);
     try
     {
         /** Recuperation du dernier en cours **/
         $reference = null; /*DB::table('ifad_moniteurs')
         ->where('ifad_moniteurs.user_id','=',Auth::user()->id)
         ->select('ifad_moniteurs.user_id')
         ->get()->last()->user_id;*/

        /*if($reference == null)
        {
            $user->delete();


            return redirect('users');
        }*/
       return redirect('users')->with('messagealert','Pas de suppression pour le moment');
      }
      catch(\Exception $exception)
      {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
   }
}
