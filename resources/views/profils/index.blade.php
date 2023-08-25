@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Profils</h1>
    <nav>
      <ol class="breadcrumb">
        <!--li class="breadcrumb-item">TTJ</li-->
      </ol>
    </nav>
</div>

<div class="container-fluid">
    <a href="javascript:history.back();" class="btn mb-1 btn-rounded btn-primary"  data-toggle="tooltip" data-placement="top" title="Retour"><i class="bi bi-arrow-90deg-left"></i></a>
    <a href="{{ route('profils.create') }}" class="btn mb-1 btn-rounded btn-primary" data-toggle="tooltip" data-placement="top" title="Nouveau profil"><i class="bi bi-plus-circle"></i><span>  </span></a>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
            <div class="card-body">
                <h4>Liste des profils</h4>
                <table class="table datatable">
                    <thead>
                        <th scope="col">Numero</th>
                        <th scope="col">Libelle</th>
                        <th scope="col">Action</th>
                    </thead>

                        <tbody>
                        @foreach($profils as $key=>$profil)
                        <tr>
                        <td scope="row"> {{++$key}} </td>
                        <td scope="row"> <a href="{{ route('profils.show', ['profil' => $profil->id]) }}" style="color:rgb(55, 144, 246);"> {{$profil->libelle}} </a></td>
                        <td scope="row">
                            <form action="{{ route('profils.destroy', ['profil' => $profil->id]) }}" method="POST" style="display: inline;" data-toggle="tooltip" data-placement="top" title="Supprimer" onsubmit="return confirm('Vous allez effectuer une suppression')">
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
