@extends('layouts.dashboard.layout')

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
            <tr>
              <td scope="row">
                <img class="image-album" />
              </td>
              <td>Summer</td>
              <td>Willian Marciel</td>
              <td>
                <button type="button" class="button-action">
                  <i class="fas fa-trash"></i>
                </button>
                <a href="{{ route('album') }}" class="button-action">
                  <i class="fas fa-search"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
        
      </div>

      <a href="{{ route('new-album') }}" class="btn-create-album">
        <i class="fas fa-plus-circle"></i>
        Criar Novo Album
      </a>
    </div>

    <input type="hidden" id="page" value="artist" />

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Recipient:</label>
                <input type="text" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Message:</label>
                <textarea class="form-control" id="message-text"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Send message</button>
          </div>
        </div>
      </div>
    </div>

  </section>
@endsection
