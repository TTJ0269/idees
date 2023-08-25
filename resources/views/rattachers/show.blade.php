@extends('layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Rattachers</h1>
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
                        <hr>
                        <p><strong>Utilisateur</strong> {{$rattacher->user->nom}} {{$rattacher->user->prenom}}</p>
                        <p><strong>Sujet</strong> {{$rattacher->sujet->libelle}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
