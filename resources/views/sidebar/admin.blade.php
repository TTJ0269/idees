@can('admin','App\Models\Profil')
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Accueil</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('profils.index')}}">
          <i class="bi bi-people"></i>
          <span>Profils</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('users.index')}}">
          <i class="bi bi-person"></i>
          <span>Utilisateurs</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('sujets.index')}}">
          <i class="bi bi-file-earmark-text"></i>
          <span>Sujets</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('rattachers.index')}}">
          <i class="bi bi-diagram-2-fill"></i>
          <span>Rattachers</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-chat"></i><span>Discussions</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
            @if (Auth::user()->rattachers)
                @foreach(Auth::user()->rattachers as $key=>$rattacher)
                <li>
                    <a href="{{ route('commentaires_create', ['sujet' => $rattacher->sujet_id]) }}">
                    <i class="bi bi-circle"></i><span>{{DB::table('sujets')->where('id','=',$rattacher->sujet_id)->select('*')->first()->libelle;}}</span>
                    </a>
                </li>
                @endforeach
            @else

            @endif
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('fichiers.index')}}">
          <i class="bi bi-file"></i>
          <span>Fichiers</span>
        </a>
      </li><!-- End Dashboard Nav -->


    </ul>

  </aside><!-- End Sidebar-->
  @endcan
