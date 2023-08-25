@csrf
<div class="pagetitle">
    <h1>Profils</h1>
    <nav>
      <ol class="breadcrumb">
        <!--li class="breadcrumb-item">TTJ</li-->
      </ol>
    </nav>
</div>

<div class="container-fluid">
        <div class="form-group row">
            <label for="text" class="col-sm-2 col-form-label">Profil</label>
            <div class="col-sm-10">
                <select class="form-control @error('libelle') is-invalid @enderror" name="libelle" id="libelle">
                    <option value="Administrateur" {{ $profil->libelle == "Administrateur" ? 'selected' : '' }}> Administrateur </option>
                    <option value="Utilisateur" {{ $profil->libelle == "Utilisateur" ? 'selected' : '' }}>Utilisateur</option>
                </select>
                @error('libelle')
                <div class="invalid-feedback">
                    {{ $errors->first('libelle')}}
                </div>
                @enderror
            </div>
        </div>
</div>
