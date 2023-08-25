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
    <div class="row">
        <div class="col-sm-12">
            <div class="card-body">
                    <form action="{{ route('profils.destroy', ['profil' => $profil->id]) }}" method="POST" style="display: inline;" data-toggle="tooltip" data-placement="top" title="Supprimer" onsubmit="return confirm('Vous allez effectuer une suppression')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn mb-1 btn-rounded btn-danger"><i class="bi bi-trash"></i><span> </span></button>
                    </form>
                    <hr>
                    <p><strong>Libelle :</strong> {{$profil->libelle}}</p>
            </div>
        </div>
    </div>
</div>
@endsection
