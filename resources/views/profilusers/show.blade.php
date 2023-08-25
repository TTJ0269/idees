@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Mon Profil</h1>
    <nav>
      <ol class="breadcrumb">
        <!--li class="breadcrumb-item">TTJ</li-->
      </ol>
    </nav>
</div>

    <!-- Main content -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">

              @foreach($users as $user)
                <form class="form-horizontal" action="{{ route('profilphotochange') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="number" hidden  name="id" value="{{$user->id}}" >
                <div class="text-center my-2">
                <img src="{{ asset('storage/image/' .$user->imageuser) }}" style="width: 100px; height: 90px;" alt="Profile" class="rounded-circle">
                </div>

                <h6 class="profile-username text-center">{{$user->nom}} {{$user->prenom}}</h6>

                <div class="form-group my-3">
                        <div class="custom-file">
                            <input type="file" name="image" class="@error('image') @enderror"/>

                            @error('image')
                        <div class="invalid-feedback">
                            {{ $errors->first('image')}}
                        </div>
                        @enderror
                        </div>
                  </div>

                  <div class="text-center">
                       <button type="submit" class="btn btn-success btn-block">Valider</button>
                  </div>
              </div>
            </div>
            </form>
            @endforeach
          </div>

          <div class="col-xl-8">

            <div class="card">
              <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">

                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Login & Email</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Mot de passe</button>
                  </li>

                </ul>
                <div class="tab-content pt-2">

                  <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    @foreach($users as $user)
                      <form class="form-horizontal" action="{{ route('profilemailchange') }}" method="POST" enctype="multipart/form-data">
                         @csrf
                         <input type="number" hidden  name="id" value="{{$user->id}}">
                        <div class="form-group row">
                          <label for="name" class="col-sm-2 col-form-label">Login</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Nom de connexion" value="{{ old('name') ?? $user->name }}" autofocus  required/>
                              @error('name')
                              <div class="invalid-feedback">
                                  {{ $errors->first('name')}}
                              </div>
                              @enderror
                          </div>
                        </div>
                        <div class="form-group row my-2">
                          <label for="email" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') ?? $user->email }}" autofocus  required/>
                            @error('email')
                              <div class="invalid-feedback">
                                  {{ $errors->first('email')}}
                              </div>
                              @enderror
                          </div>
                        </div>
                        <div class="form-group row my-2">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-success">Sauvegarder</button>
                          </div>
                        </div>
                      </form>
                     @endforeach

                  </div>

                  <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                    @foreach($users as $user)
                    <form class="form-horizontal" action="{{ route('profilpasswordchange') }}" method="POST" enctype="multipart/form-data">
                       @csrf
                       <input type="number" hidden  name="id" value="{{$user->id}}" >
                       <!--<div class="form-group row">
                        <label for="lastpassword" class="col-sm-3 col-form-label"> Ancien Mot de passe</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control @error('lastpassword') is-invalid @enderror" name="lastpassword"  placeholder="Ancien mot de passe" autofocus  required/>
                            @error('lastpassword')
                            <div class="invalid-feedback">
                                {{ $errors->first('lastpassword')}}
                            </div>
                            @enderror
                        </div>
                      </div>-->

                      <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label"> Nouveau Mot de passe</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Nouveau mot de passe" autofocus  required/>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $errors->first('password')}}
                            </div>
                            @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="confirmepassword" class="col-sm-3 col-form-label">Confirmation</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control @error('confirmepassword') is-invalid @enderror" name="confirmepassword" placeholder="Confirmation" autofocus  required/>
                          @error('confirmepassword')
                            <div class="invalid-feedback">
                                {{ $errors->first('confirmepassword')}}
                            </div>
                            @enderror
                        </div>
                      </div>
                      <div class="form-group row my-2">
                        <div class="offset-sm-3 col-sm-9">
                          <button type="submit" class="btn btn-danger">Sauvegarder</button>
                        </div>
                      </div>
                    </form>
                    @endforeach

                  </div>

              </div>
            </div>

          </div>

                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->


@endsection
