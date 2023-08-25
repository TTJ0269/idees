@extends('layouts.appwelcome')

@section('content')

<div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

          <div class="d-flex justify-content-center py-4">
            <a>
              <img src="{{ asset('storage/image-ifad/aed.png') }}" alt="" style="width: 250px; height: 100px;">
              <span class="d-none d-lg-block"></span>
            </a>
          </div><!-- End Logo -->

          <div class="card mb-3">

            <div class="card-body">

              <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Connectez-vous à votre compte</h5>
                <p class="text-center small">Entrez votre nom d'utilisateur & votre mot de passe pour vous connecter</p>
              </div>

                <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('login') }}">
                    @csrf
                <div class="col-12">
                  <label for="yourUsername" class="form-label">Email</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                    <div class="invalid-feedback">email!</div>
                  </div>
                </div>

                <div class="col-12">
                  <label for="yourPassword" class="form-label">Mot de passe</label>
                  <input id="password" class="form-control"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                  <div class="invalid-feedback">mot de passe!</div>
                </div>

                <div class="col-12">
                  <button class="btn btn-primary w-100" type="submit">Se connecter</button>
                </div>
                <!--div class="col-12">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div-->
              </form>

            </div>
          </div>

        </div>
      </div>
</div>

@endsection
