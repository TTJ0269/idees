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
    <a href="{{ route('users.create') }}" class="btn mb-1 btn-rounded btn-primary" data-toggle="tooltip" data-placement="top" title="Nouveau utilisateur"><i class="bi bi-plus-circle"></i></a>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
            <div class="card-body">
                <h4>Liste des utilisateurs</h4>
                        <table class="table datatable">
                        <thead>
                            <th scope="col">Numero</th>
                            <th scope="col">Login</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Téléphone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Profil</th>
                            <th scope="col">Action</th>
                        </thead>

                            <tbody>
                            @foreach($users as $key=>$user)
                            <tr>
                            <th scope="row"> {{++$key}} </th>
                            <td> <a href="{{ route('users.show', ['user' => $user->id]) }}" style="color:rgb(55, 144, 246);"> {{$user->name}} </a> </td>
                            <th scope="row"> {{$user->nom}} {{$user->prenom}} </th>
                            @if($user->tel)
                            <th scope="row"> {{$user->tel}} </th>
                            @else
                            <th scope="row"> -- Aucune valeur trouvée -- </th>
                            @endif
                            @if($user->email)
                            <th scope="row"> {{$user->email}} </th>
                            @else
                            <th scope="row"> -- Aucune valeur trouvée -- </th>
                            @endif
                            <th scope="row"> {{$user->profil->libelle}} </th>
                            <th scope="row" class="col-sm-2">
                                <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn mb-1 btn-rounded btn-primary" data-toggle="tooltip" data-placement="top" title="Modifier"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn mb-1 btn-rounded btn-danger" data-toggle="tooltip" data-placement="top" title="Supprimer"><i class="bi bi-trash"></i></button>
                                </form>
                            </th>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
                </div>
        </div>
    </div>
    </div>
@endsection
