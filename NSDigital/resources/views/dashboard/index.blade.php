@extends('layouts.dashboard.layout')

@section('content')
  <section class="container">
    <h2 class="page-title">Painel de Controle</h2>
    <div class="tab-pages">
      <a href="#" class="active">Overview</a>
      <a href="#">Artistas</a>
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
        </div>
      </div>
      <div class="col-md-4">
        <div class="group-albuns">
          <a href="#">Criar Novo Álbum</a>
          <button class="shortcut-create-album">
            <i class="fas fa-arrow-right"></i>
          </button>
        </div>
      </div>
    </div>
  </section>
@endsection
