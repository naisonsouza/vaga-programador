@extends('layouts.dashboard.layout')

@section('content')

  <section class="container">
    
    <h2 class="page-title">Painel de Controle</h2>
    <div class="tab-pages">
      <a href="{{ route('dashboard') }}" class="active">Overview</a>
      <a href="{{ route('artists') }}">Artistas</a>
      <a href="{{ route('albuns') }}">Albuns</a>
    </div>
    <div class="row container-overview">
      <div class="col-md-3">
        <div class="group-artists">
          <div class="group-artists-header">
            <div class="indicate-artists-image">
              <i class="fas fa-play"></i>
            </div>
            <div class="indicate-artists-info">
              <h5>+ 100</h5>
              <p>novos artistas</p>
            </div>
          </div>
          <div class="group-artists-new">
            <a href="{{ route('new-artist') }}">Criar Novo Artista
              <button class="shortcut-create-artist">
                <i class="fas fa-arrow-right"></i>
              </button>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="group-albuns">
          <a href="{{ route('albuns') }}">Criar Novo Álbum
            <button class="shortcut-create-album">
              <i class="fas fa-arrow-right"></i>
            </button>
          </a>
        </div>
        <div class="group-albuns-statics">
          <div class="indicate-albuns-image">
            <i class="fas fa-compact-disc"></i>
          </div>
          <div class="indicate-albuns-info">
            <h5>+ 100</h5>
            <p>novos albuns</p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
