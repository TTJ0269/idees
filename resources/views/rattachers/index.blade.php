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
<a href="{{ route('rattachers.create') }}" class="btn btn-primary my-3"><i class="fas fa-plus-circle"></i><span> Nouveau </span></a>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-body">
                            <table class="table datatable">
                                <hr>
                            <thead>
                                <th scope="col">Numero</th>
                                <th scope="col">Utilisateur</th>
                                <th scope="col">Sujet</th>
                            </thead>

                                <tbody>
                                @foreach($rattachers as $key=>$rattacher)
                                <tr>
                                <th scope="row"> {{++$key}} </th>
                                <td> <a href="{{ route('rattachers.show', ['rattacher' => $rattacher->id]) }}" style="color:rgb(55, 144, 246);"> {{$rattacher->user->nom}} {{$rattacher->user->prenom}} </a></td>
                                <th scope="row"> {{$rattacher->sujet->libelle}}  </th>
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
