@extends('layouts.dashboard.artists-layout')

@section('content')
  <section class="container">
    {{-- @include('dashboard.header-forms') --}}

    <h2 class="page-title">Painel de Controle - Artistas</h2>
    <div class="tab-pages">
      <a href="{{ route('dashboard') }}">Overview</a>
      <a href="{{ route('artists') }}" class="active">Artistas</a>
      <a href="{{ route('albuns') }}">Albuns</a>
    </div>

    <div class="row container-table-artists">
      <div class="col-md-12 table-responsive table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table table-dark table-bordered table-hover mb-0">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Imagem</th>
              <th scope="col">Nome</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($artists as $artist)
              <tr id="{{$artist->id}}">
                <th scope="row">{{$artist->id}}</th>
                <td>
                  <img class="img_artist"
                    src="{{url('storage/uploads/artist/'.$artist->filename)}}" alt="{{$artist->filename}}" />
                </td>
                <td>{{$artist->name}}</td>
                <td class="actions">
                  <a href="{{ route('new-album', ['id' => $artist->id]) }}" id="{{$artist->id}}" class="button-action">
                    <i class="fas fa-compact-disc"></i>
                  </a>
                  <a href="#" id="{{$artist->id}}" class="button-action edit_button">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="#" id="{{$artist->id}}" class="button-action view_button">
                    <i class="fas fa-search"></i>
                  </a>
                  <a id="{{$artist->id}}" href="#" class="button-action remove_button">
                    <i class="fas fa-trash"></i>
                  </a>
                </td>              
              </tr>
            @endforeach
          </tbody>
        </table>
        
      </div>

      <a href="{{ route('new-artist') }}" class="btn-create-album">
        <i class="fas fa-plus-circle"></i>
        Criar Novo Artista
      </a>
    </div>

    <input type="hidden" id="page" value="artist" />

    <!-- The Modal -->
    <div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header">
          <h2>Editar</h2>
          <span class="close">&times;</span>
        </div>
        <div class="modal-body">
          @include('dashboard.artists.artist-form', ['page' => 'edit'])
        </div>
        <div class="modal-footer">
          <br /><br />
        </div>
      </div>
    </div>

    <div id="viewModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header">
          <h2>Visualizar</h2>
          <span class="close">&times;</span>
        </div>
        <div class="modal-body">
          @include('dashboard.artists.artist-form', ['page' => 'view'])
        </div>
        <div class="modal-footer">
          <br /><br />
        </div>
      </div>
    </div>

  </section>
@endsection

