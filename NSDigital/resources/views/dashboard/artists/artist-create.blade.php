@extends('layouts.dashboard.layout')

@section('content')
  <section class="container">
    {{-- @include('dashboard.header-forms') --}}

    <h2 class="page-title">Cadastrar novo Artista</h2>
    <div class="tab-pages">
      <a href="{{ route('artists') }}">
        <i class="fas fa-arrow-left"></i> Voltar
      </a>
      <a href="#"></a>

      <a href="{{ route('new-artist') }}" class="active">Artista</a>
    </div>

    <div class="row">
      <div class="col-md-12 container-form">
        <form action="">
          <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="nameHelp" aria-describedby="emailHelp" placeholder="Nome do Artista">
            <small id="emailHelp" class="form-text text-muted">Informe o nome do artista para cadastro.</small>
          </div>

          <div class="form-group">
            <label for="inputFile">Imagem do Artista</label>
            <input type="file" class="form-control-file" id="inputFile">
          </div>

          <div class="container-form-button">
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </form>
      </div>
    </div>

  </section>
@endsection
