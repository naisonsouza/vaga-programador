@extends('layouts.dashboard.albuns-layout')

@section('content')
  <section class="container">
    {{-- @include('dashboard.header-forms') --}}

    <h2 class="page-title">Cadastrar novo Álbum</h2>
    <div class="tab-pages">
      <a href="{{ route('albuns') }}">
        <i class="fas fa-arrow-left"></i> Voltar
      </a>
      <a href="#"></a>

      <a href="{{ route('new-album') }}" class="active">Álbum</a>
    </div>
    
    <div class="row container-form">
      @include('dashboard.albuns.album-form', ['page' => 'new'])
    </div>

  </section>
@endsection
