@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Discussions</h1>
    <nav>
      <ol class="breadcrumb">
        <!--li class="breadcrumb-item">TTJ</li-->
      </ol>
    </nav>
</div>

<div class="content">
    <div class="container-fluid">
        <a href="javascript:history.back();" class="btn mb-1 btn-rounded btn-primary"  data-toggle="tooltip" data-placement="top" title="Retour"><i class="bi bi-arrow-90deg-left"></i></a>
            <div class="row d-flex justify-content-center">
              <div class="col-sm-12">

                <div class="card" id="chat1" style="border-radius: 15px;">
                  <div
                    class="card-header d-flex justify-content-between align-items-center p-3 bg-primary text-white border-bottom-0"
                    style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                    <i class="fas fa-angle-left"></i>
                    <p class="mb-0 fw-bold">Sujet de discussion : {{$sujet_libelle}}</p>
                    <i class="fas fa-times"></i>
                  </div>
                  <div class="card-body">
                    <br>
                        <!-- Afficher les données actualisées ici -->
                      @foreach ($commentaires_show as $commentaire)
                          @if(Auth::user()->id != $commentaire->id_user)
                              <div class="d-flex flex-row justify-content-start mb-4">
                                    @if ($commentaire->imageuser)
                                    <img src="{{ asset('storage/image/' .$commentaire->imageuser) }}"
                                    alt="img" style="width: 50px; height: 50px;" class="rounded-circle">
                                    @else
                                    <img src="{{ asset('storage/image-ifad/person.jpg') }}"
                                    alt="img" style="width: 50px; height: 50px;" class="rounded-circle">
                                    @endif
                                  <p>{{ $commentaire->nom}} {{ $commentaire->prenom}} </p>
                                  <div class="p-3 ms-3" style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">
                                  <p class="small mb-0">{{ $commentaire->message }} <i style="font-size:0.7vw"> {{$commentaire->created_at}}</i></p>
                                    @foreach ($fichiers as $fichier)
                                        @if($fichier->urlfichier && $fichier->commentaire_id == $commentaire->id)
                                        <a href="{{ route('fichiers_download', ['file' => $fichier->urlfichier]) }}" class="btn btn-primary my-3"> <i class="bi bi-download"></i><span> </span> </a>
                                            <div class="d-flex flex-row justify-content-start mb-4">
                                            <iframe src="{{ asset('storage/fichier/' .$fichier->urlfichier) }}" frameborder="0" style="width: 200px; height: 100px;"></iframe>
                                            </div>
                                        @endif
                                    @endforeach
                                  </div>
                              </div>
                          @else
                              <div class="d-flex flex-row justify-content-end mb-4">
                                  <div class="p-3 me-3 border" style="border-radius: 15px; background-color: #fbfbfb;">
                                  <p class="small mb-0">{{ $commentaire->message }} <i style="font-size:0.7vw"> {{$commentaire->created_at}}</i>

                                    @foreach ($fichiers as $fichier)
                                        @if($fichier->urlfichier && $fichier->commentaire_id == $commentaire->id)
                                        <a href="{{ route('fichiers_download', ['file' => $fichier->urlfichier]) }}" class="btn btn-primary my-3"> <i class="bi bi-download"></i><span></span> </a>
                                            <div class="d-flex flex-row justify-content-end mb-4">
                                            <iframe src="{{ asset('storage/fichier/' .$fichier->urlfichier) }}" frameborder="0" style="width: 200px; height: 100px;"></iframe>
                                            </div>
                                        @endif
                                    @endforeach

                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$commentaire->id}}" data-whatever="@mdo"></button>
                                  <div class="modal fade" id="exampleModal{{$commentaire->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                          </div>
                                          <form action="{{ route('commentaires_update')}}" method="POST" enctype="multipart/form-data">
                                              @csrf
                                              <div class="modal-body">
                                                      <input type="number" name="sujet_id" value="{{$sujet_id}}" hidden>
                                                      <input type="number" name="rattacher_id" value="{{$rattacher_id}}" hidden>
                                                      <input type="number" name="commentaire_id" value="{{$commentaire->id}}" hidden>
                                                      <div class="form-outline">
                                                          <textarea class="form-control" id="textArea{{$commentaire->id}}" rows="4" name="message" id="message{{$commentaire->id}}" required> {{$commentaire->message}}
                                                          </textarea>
                                                      </div>
                                              </div>
                                              <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                              <button type="submit" class="btn mb-1 btn-rounded btn-primary" data-toggle="tooltip" data-placement="top" title="Modifier"><i class="bi bi-pencil-square"></i> Modifier </button>
                                          </form>
                                          <form action="{{ route('commentaires.destroy', ['commentaire' => $commentaire->id]) }}" method="POST" style="display: inline;" data-toggle="tooltip" data-placement="top" title="Supprimer" onsubmit="return confirm('Vous allez effectuer une suppression')">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn mb-1 btn-rounded btn-danger"><i class="bi bi-trash"></i><span> Supprimer </span></button>
                                          </form>
                                          </div>
                                      </div>
                                      </div>
                                  </div>

                                  </p>
                                  </div>
                                  @if (Auth::user()->imageuser)
                                  <img src="{{ asset('storage/image/' .Auth::user()->imageuser) }}"
                                  alt="img" style="width: 50px; height: 50px;" class="rounded-circle">
                                  @else
                                  <img src="{{ asset('storage/image-ifad/person.jpg') }}"
                                  alt="img" style="width: 50px; height: 50px;" class="rounded-circle">
                                  @endif
                                  <p>Vous</p>
                              </div>
                          @endif
                      @endforeach


                    <form action="{{ route('commentaires.store') }}" method="POST" enctype="multipart/form-data">
                      @include('commentaires.form')
                      <div class="text-center">
                          <!--a href="{{ route('fichiers_create', ['sujet_id' => $sujet_id,'commentaire_id' => $commentaire->id, ]) }}" class="btn mb-1 btn-rounded btn-primary my-1" data-toggle="tooltip" data-placement="top" title="Ajouter un fichier"> <i class="bi bi-file"></i>  </a-->
                          <button type="submit" class="btn mb-1 btn-rounded btn-success my-1" data-toggle="tooltip" data-placement="top" title="Valider"> <i class="bi bi-check-circle"> Valider </i> </button>
                      </div>
                    </form>

                  </div>
                </div>

              </div>
            </div>

          </div>

</div>

@endsection
