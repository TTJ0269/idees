@extends('layouts.app')

@section('content')

<form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
  @method('PATCH')
  @include('users.formmodif')
  <div class="text-center">
    <button type="submit" class="btn mb-1 btn-rounded btn-success my-1" data-toggle="tooltip" data-placement="top" title="Valider"> <i class="bi bi-check-circle"></i> </button>
  </div>
</form>

@endsection
