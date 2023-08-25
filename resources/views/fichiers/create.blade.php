@extends('layouts.app')

@section('content')

<div class="content">
            <form action="{{ route('fichiers.store') }}" method="POST" enctype="multipart/form-data">
            @include('fichiers.form')
            <div class="text-center">
                <button type="submit" class="btn btn-primary my-1">Ajouter un fichier</button>
            </div>
            </form>
</div>

@endsection
