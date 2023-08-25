@csrf

<div class="pagetitle">
    <h1>Utilisateurs</h1>
    <nav>
      <ol class="breadcrumb">
        <!--li class="breadcrumb-item">TTJ</li-->
      </ol>
    </nav>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                            @if (session()->has('messagealert'))
                            <div class="alert alert-danger" role="alert">
                            {{ session()->get('messagealert') }}
                            </div>
                            @endif
                <div class="content">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <label for="text" class="col-sm-12 col-form-label">Login</label>
                                    <div class="col-sm-12">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                            <span class="input-group-text"><i class="nav-icon bi bi-at"></i></span>
                                            </div>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Rentrez le nom de utilisateur..." value="{{ old('name') ?? $user->name }}" autofocus  required/>
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('name')}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                <label for="text" class="col-sm-12 col-form-label">Nom</label>
                                    <div class="col-sm-12">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                            <span class="input-group-text"><i class="nav-icon bi bi-brush"></i></span>
                                            </div>
                                            <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" placeholder="Rentrez le nom de l'utilisateur..." value="{{ old('nom') ?? $user->nom }}" autofocus  required/>
                                            @error('nom')
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('nom')}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                <label for="text" class="col-sm-12 col-form-label">Prénom</label>
                                    <div class="col-sm-12">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                            <span class="input-group-text"><i class="nav-icon bi bi-brush"></i></span>
                                            </div>
                                            <input type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" placeholder="Rentrez le prenom de l'utilisateur..." value="{{ old('prenom') ?? $user->prenom }}" autofocus  required/>
                                            @error('prenom')
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('prenom')}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                <label for="text" class="col-sm-12 col-form-label">Téléphone</label>
                                    <div class="col-sm-12">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                            <span class="input-group-text"><i class="nav-icon bi bi-phone"></i></span>
                                            </div>
                                            <input type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" placeholder="Rentrez le tel de l'utilisateur..." value="{{ old('tel') ?? $user->tel }}"/>
                                            @error('tel')
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('tel')}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                <label for="text" class="col-sm-12 col-form-label">Email</label>
                                    <div class="col-sm-12">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                            <span class="input-group-text"><i class="nav-icon bi bi-envelope"></i></span>
                                            </div>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Rentrez email de l'utilisateur..." value="{{ old('email') ?? $user->email }}"/>
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('email')}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!--div class="col-12 col-sm-6">
                                <label for="text" class="col-sm-2 col-form-label">Mot de passe</label>
                                    <div class="col-sm-10">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Rentrez le mot de passe de l'utilisateur..." value="{{ old('password') ?? $user->password }}" autofocus  required/>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password')}}
                                        </div>
                                    @enderror
                                    </div>
                                </div-->

                                <div class="col-12 col-sm-6">
                                <label for="text" class="col-sm-12 col-form-label">Profil</label>
                                    <div class="col-sm-12">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="bi bi-people"></i></span>
                                            </div>
                                            <select class="custom-select @error('profil_id') is-invalid @enderror" name="profil_id">
                                                    @foreach($profils as $profil)
                                                <option value="{{ $profil->id}}" {{ $user->profil_id == $profil->id ? 'selected' : ''}}> {{ $profil->libelle }} </option>
                                                @endforeach
                                            </select>
                                            @error('profil_id')
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('profil_id')}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
