@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Sujets</h1>
    <nav>
      <ol class="breadcrumb">
        <!--li class="breadcrumb-item">TTJ</li-->
      </ol>
    </nav>
</div>

<div class="container-fluid">
    <a href="javascript:history.back();" class="btn mb-1 btn-rounded btn-primary"  data-toggle="tooltip" data-placement="top" title="Retour"><i class="bi bi-arrow-90deg-left"></i></a>
    <a href="{{ route('sujets.create') }}" class="btn mb-1 btn-rounded btn-primary" data-toggle="tooltip" data-placement="top" title="Nouveau sujet"><i class="bi bi-plus-circle"></i><span>  </span></a>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
            <div class="card-body">
                <h4>Liste des sujets</h4>
                <table class="table datatable">
                    <thead>
                        <th scope="col">Numero</th>
                        <th scope="col">Libelle</th>
                        <th scope="col">Action</th>
                    </thead>

                        <tbody>
                        @foreach($sujets as $key=>$sujet)
                        <tr>
                        <td scope="row"> {{++$key}} </td>
                        <td scope="row"> <a href="{{ route('commentaires_create', ['sujet' => $sujet->id]) }}" style="color:rgb(55, 144, 246);"> {{$sujet->libelle}} </a></td>
                        <td scope="row">
                            <a href="{{ route('sujets.edit', ['sujet' => $sujet->id]) }}" class="btn mb-1 btn-rounded btn-primary" data-toggle="tooltip" data-placement="top" title="Modifier"><i class="bi bi-pencil-square"></i><span> </span></a>
                            <form action="{{ route('sujets.destroy', ['sujet' => $sujet->id]) }}" method="POST" style="display: inline;" data-toggle="tooltip" data-placement="top" title="Supprimer" onsubmit="return confirm('Vous allez effectuer une suppression')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn mb-1 btn-rounded btn-danger"><i class="bi bi-trash"></i><span> </span></button>
                            </form>
                        </td>
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
