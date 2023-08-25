@csrf
<div class="pagetitle">
    <h1>Sujets</h1>
    <nav>
      <ol class="breadcrumb">
        <!--li class="breadcrumb-item">TTJ</li-->
      </ol>
    </nav>
</div>

<div class="container-fluid">
    <div class="col-12 col-sm-12">
        <label for="text" class="col-sm-12 col-form-label">Libelle</label>
        <div class="col-sm-12">
            <div class="input-group mb-3">
                <div class="input-group-append">
                <span class="input-group-text"><i class="nav-icon bi bi-brush"></i></span>
                </div>
                <input type="text" class="form-control @error('libelle') is-invalid @enderror" name="libelle" placeholder="Rentrez le libelle du sujet..." value="{{ old('libelle') ?? $sujet->libelle }}" autofocus  required/>
                @error('libelle')
                    <div class="invalid-feedback">
                        {{ $errors->first('libelle')}}
                    </div>
                @enderror
            </div>
        </div>
    </div>
</div>
