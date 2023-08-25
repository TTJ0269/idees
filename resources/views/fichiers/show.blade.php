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
                        <a href="{{ route('fichiers_download', ['file' => $fichier->urlfichier]) }}" class="btn btn-primary my-3"> <i class="bi bi-download"></i><span> Télécharger </span> </a>
                        <!--  <a href="{{ route('fichiers.edit', ['fichier' => $fichier->id]) }}" class="btn btn-primary my-3">Modifier</a> -->
                        <form action="{{ route('fichiers.destroy', ['fichier' => $fichier->id]) }}" method="POST" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i><span> Supprimer </span></button>
                        </form>
                        <hr>
                        <p><strong>Libelle :</strong> {{$fichier->libellefichier}}</p>
                        @if($fichier->urlfichier)
                        <iframe src="{{ asset('storage/fichier/' .$fichier->urlfichier) }}" frameborder="0" style="width: 600px; height: 400px;"></iframe>
                        @endif
                        <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
