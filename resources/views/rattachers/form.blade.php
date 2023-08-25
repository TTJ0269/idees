@csrf
<div class="pagetitle">
    <h1>Rattachers</h1>
    <nav>
      <ol class="breadcrumb">
        <!--li class="breadcrumb-item">TTJ</li-->
      </ol>
    </nav>
</div>

    <!-- /.content-header -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

               <div class="content">
                      <hr>

              <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Sujet</label>
                <div class="col-sm-10">
                  <div class="input-group mb-3">
                      <div class="input-group-append">
                        <span class="input-group-text"><i class="nav-icon bi bi-pen"></i></span>
                      </div>
                      <select class="form-control  @error('sujet_id') is-invalid @enderror" name="sujet_id">
                        <option selected disabled> Sélectionner un sujet</option>
                        @foreach($sujets as $sujet)
                        <option value="{{ $sujet->id}}"> {{ $sujet->libelle }}</option>
                        @endforeach
                      </select>
                   </div>
                      @error('sujet_id')
                      <div class="invalid-feedback">
                          {{ $errors->first('sujet_id')}}
                      </div>
                    @enderror
                 </div>
              </div>


            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Utilisateur(s)</label>
                <div class="col-sm-10">
                  <div class="input-group mb-3">
                      <div class="input-group-append">
                        <span class="input-group-text"><i class="bi bi-people"></i></span>
                      </div>
                      <select class="form-control @error('user_id') is-invalid @enderror" name="user_id[]" multiple>
                        <option disabled> Sélectionner un ou des utilisateur(s)</option>
                        @foreach($users as $user)
                        <option value="{{ $user->id}}"> {{ $user->nom }} {{ $user->prenom }} </option>
                        @endforeach
                      </select>
                   </div>
                      @error('user_id')
                      <div class="invalid-feedback">
                          {{ $errors->first('user_id')}}
                      </div>
                    @enderror
                 </div>
              </div>

                </div>
            </div>
        </div>
    </div>
</div>
