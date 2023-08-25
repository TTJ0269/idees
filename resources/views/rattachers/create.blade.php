@extends('layouts.app')

@section('content')

<div class="content">

            <form action="{{ route('rattachers.store') }}" method="POST" enctype="multipart/form-data">
            @include('rattachers.form')
            <div class="text-center">
                <button type="submit" class="btn mb-1 btn-rounded btn-success my-1" data-toggle="tooltip" data-placement="top" title="Valider"> <i class="bi bi-check-circle"></i> </button>
            </div>
            </form>
</div>

@endsection
