@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Utilisateurs</h1>
    <nav>
      <ol class="breadcrumb">
        <!--li class="breadcrumb-item">TTJ</li-->
      </ol>
    </nav>
</div>

    <div class="container-fluid">
        <a href="javascript:history.back();" class="btn mb-1 btn-rounded btn-primary"  data-toggle="tooltip" data-placement="top" title="Retour"><i class="bi bi-arrow-90deg-left"></i></a>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-body">
                        <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn mb-1 btn-rounded btn-primary" data-toggle="tooltip" data-placement="top" title="Modifier"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn mb-1 btn-rounded btn-danger" data-toggle="tooltip" data-placement="top" title="Supprimer"><i class="bi bi-trash"></i></button>
                        </form>
                        <hr>
                        <p><strong>Nom :</strong> {{$user->nom}}</p>
                        <p><strong>Prenom :</strong> {{$user->prenom}}</p>
                        <p><strong>Email :</strong> {{$user->email}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
