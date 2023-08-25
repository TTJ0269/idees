@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Discussions</h1>
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
                        @foreach($sujets as $key=>$sujet)
                        <tr>
                        <td scope="row"> {{++$key}} </td>
                        <td scope="row"> {{$sujet->libelle}} </td>
                        <td scope="row"> <a href="{{ route('commentaires_create', ['sujet' => $sujet->id]) }}" style="color:rgb(55, 144, 246);"> Aller </a></td>
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
