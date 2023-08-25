@csrf

<div class="pagetitle">
    <h1>Fichier</h1>
    <nav>
      <ol class="breadcrumb">
        <!--li class="breadcrumb-item">TTJ</li-->
      </ol>
    </nav>
</div>
<a href="javascript:history.back();" class="btn mb-1 btn-rounded btn-primary"  data-toggle="tooltip" data-placement="top" title="Retour"><i class="bi bi-arrow-90deg-left"></i></a>
<!-- /.content-header -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-body">

                   <input type="number" name="sujet_id" value="{{$sujet->id}}" hidden>

                    <div class="form-group row">
                        <label for="name" class="col-sm-12 col-form-label">Libelle fichier</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('libellefichier') is-invalid @enderror" name="libellefichier" placeholder="Rentrez le libelle..." autofocus  required/>
                            @error('libellefichier')
                                <div class="invalid-feedback">
                                    {{ $errors->first('libellefichier')}}
                                </div>
                            @enderror
                            </div>
                     </div>

                    <div class="form-group row">
                       <label for="name" class="col-sm-12 col-form-label">Fichier Joint</label>
                      <div class="col-sm-12">
                        <div class="custom-file">
                            <input type="file" name="urlfichier" class="custom-file-input @error('urlfichier') is-invalid @enderror" id="validatedCustomFile"/>
                            <label class="custom-file-label" for="validatedCustomFile"></label>
                            @error('urlfichier')
                             <div class="invalid-feedback">
                              {{ $errors->first('urlfichier')}}
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
