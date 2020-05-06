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
        
        @include('dashboard.artists.artist-form', ['page' => 'new'])

      </div>
    </div>

  </section>
@endsection
