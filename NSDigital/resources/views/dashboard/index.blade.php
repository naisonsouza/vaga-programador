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
              <i class="fas fa-user"></i>
            </div>
            <div class="indicate-artists-info">
              <h5>{{ $artistsCount }}</h5>
              <p>artistas cadastrados</p>
            </div>
            
          </div>

          <div class="group-artists-new">
            <div class="indicate-artists-info">
              @if($lastArtist)
                <h5>{{ $lastArtist->name }}</h5> <p>{{$lastArtist->created_at}}</p>
                <p>último artista cadastrado</p> 
              @endif
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
            <h5>{{ $albunsCount }}</h5>
            <p>albuns cadastrados</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="group-artists">
          <div class="group-artists-header">
            <div class="indicate-artists-image">
              <i class="fas fa-play"></i>
            </div>
            <div class="indicate-artists-info">
              <h5>{{ $musicsCount }}</h5>
              <p>músicas cadastrados</p>
            </div>
          </div>
          <div class="group-artists-new">
            <div class="indicate-artists-info">
              <h4>{{ $lastMusic->title }} - {{ $lastAlbum->title }}</h4>
              <p>última música cadastrada</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
