@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Fichiers</h1>
    <nav>
      <ol class="breadcrumb">
        <!--li class="breadcrumb-item">TTJ</li-->
      </ol>
    </nav>
</div>
<a href="javascript:history.back();" class="btn mb-1 btn-rounded btn-primary"  data-toggle="tooltip" data-placement="top" title="Retour"><i class="bi bi-arrow-90deg-left"></i></a>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-body">
                            <table class="table datatable">
                            <thead>
                                <th scope="col">Numero</th>
                                <th scope="col">Libelle</th>
                                <th scope="col">Commentaire</th>
                            </thead>

                                <tbody>
                                @foreach($fichiers as $key=>$fichier)
                                <tr>
                                <th scope="row"> {{++$key}} </th>
                                <td> <a href="{{ route('fichiers.show', ['fichier' => $fichier->id]) }}"> {{$fichier->libellefichier}} </a></td>
                                <th scope="row"> {{$fichier->libelle}} </th>
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
