@extends('layouts.dashboard.albuns-layout')

@section('content')
  <section class="container">
    {{-- @include('dashboard.header-forms') --}}

    <h2 class="page-title">Painel de Controle - Albuns</h2>
    <div class="tab-pages">
      <a href="{{ route('dashboard') }}">Overview</a>
      <a href="{{ route('artists') }}">Artistas</a>
      <a href="{{ route('albuns') }}" class="active">Albuns</a>
    </div>

    <div class="row container-table-artists">
      <div class="col-md-12 table-responsive table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table table-dark table-bordered table-hover mb-0">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col">Titúlo</th>
              <th scope="col">Artista</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($albuns as $album)
              <tr>
                <td scope="row">
                  <img class="img_album"
                  src="{{url('storage/uploads/album/'.$album->filename)}}" alt="{{$album->filename}}"/>
                </td>
                <td>{{$album->title}}</td>
                <td>{{$album->artist->name}}</td>
                <td>
                  <button type="button" class="button-action">
                    <i class="fas fa-trash"></i>
                  </button>
                  <a href="{{ route('album') }}" class="button-action">
                    <i class="fas fa-search"></i>
                  </button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        
      </div>

      <a href="#" id="btn-create-album" class="btn-create-album">
        <i class="fas fa-plus-circle"></i>
        Criar Novo Album
      </a>
    </div>

    <input type="hidden" id="page" value="artist" />

    <!-- The Modal -->
    <div id="modalArtists" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header">
          <h2>Selecionar Artista</h2>
          <span class="close">&times;</span>
        </div>
        <div class="modal-body">
          <form action="">
            <div class="container_artists">
              <label for="list_artits">Lista de Artistas</label>
              <select name="list_artits" id="list_artits"></select>
              <a id="btn-select-artist" href="#" class="btn-create-album">
                Selecionar
              </a>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <br /><br />
        </div>
      </div>
    </div>
  
  </section>
@endsection
