@extends('layouts.dashboard.layout')

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
      <div class="col-md-12 table-responsive">
        <table class="table table-dark table-bordered table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Imagem</th>
              <th scope="col">Nome</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>
                <img src="{{url('uploads/ns_logo.png')}}" />
              </td>
              <td>Mark</td>
              <td>
                <a href="{{ route('new-artist') }}" class="button-action">
                  <i class="fas fa-trash"></i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
        
      </div>

      <a href="{{ route('new-artist') }}" class="btn-create-album">
        <i class="fas fa-plus-circle"></i>
        Criar Novo Artista
      </a>
    </div>

  </section>
@endsection
