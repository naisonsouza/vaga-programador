@extends('layouts.dashboard.layout')

@section('content')
  <section class="container">
    {{-- @include('dashboard.header-forms') --}}

    <h2 class="page-title">Painel de Controle</h2>
    <div class="tab-pages">
      <a href="{{ route('dashboard') }}">Overview</a>
      <a href="{{ route('artists') }}" class="active">Artistas</a>
      <a href="{{ route('albuns') }}">Albuns</a>
    </div>

    <div class="row container-table-artists">
      <div class="col-md-12 table-responsive">
        <table class="table table-dark table-bordered table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>
                <button type="button" class="button-action">
                  <i class="fas fa-plus-circle"></i>
                </button>
                <button type="button" class="button-action">
                  <i class="fas fa-trash"></i>
                </button>
              </td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>
                <button type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" class="button-action">
                  <i class="fas fa-plus-circle"></i>
                </button>
                <button type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" class="button-action">
                  <i class="fas fa-trash"></i>
                </button>
              </td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Larry</td>
              <td>
                <button type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" class="button-action">
                  <i class="fas fa-plus-circle"></i>
                </button>
                <button type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" class="button-action">
                  <i class="fas fa-trash"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
        
      </div>
    </div>

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
