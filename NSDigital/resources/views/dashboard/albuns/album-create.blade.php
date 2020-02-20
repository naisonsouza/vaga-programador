@extends('layouts.dashboard.layout')

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
      <div class="col-md-4 form-album">
        <div class="form-input-file">
          <label for="image-album" class="label-input-file">
            <i class="fas fa-music"></i>
            
            <span id="file-name">Imagem do Álbum</span>
          </label>
          <input type="file" id="image-album" name="image-album" class="form-control-file" />
        </div>
        <div class="form-input-title">
          {{-- <label for="title-album">Titúlo do Album</label> --}}
          <input type="text" id="title-album" name="title-album" class="form-control-file" aria-describedby="formlHelp" placeholder="Titúlo do Álbum..." />
        </div>
        <small id="formlHelp" class="form-text text-muted">Antes de salvar, adicione música(s) ao lado.</small>

        <div class="container-form-button">
          <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
      </div>
      <div class="col-md-7">
        <div class="form-music">
          <div class="form-music-input-container">
            <div class="form-input">
              <input type="text" id="title-album" name="title-album" class="input-title-music" aria-describedby="formlHelp" placeholder="Titúlo da música..." />
            </div>

            <div class="form-input-file">
              <label for="music-file" class="label-input-file">
                <i class="fa fa-save"></i>
                <span id="music-name">Escolher o arquivo...</span>
              </label>
              <input type="file" id="music-file" name="music-file" class="form-control-file" />
            </div>
          </div>

          <a href="#" id="btn-add-music">
            <i class="fas fa-plus-circle"></i>
          </a>
        </div>

        <div class="table-musics table-responsive table-hover">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">
                  <i class="fa fa-music"></i>
                </th>
                <th scope="col">Titúlo</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row">
                  <i class="fa fa-music"></i>
                </td>
                <td>Summer</td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>
      {{-- <div class="col-md-1 container-table-actions">
        <a href="#" id="btn-add-music" class="table-actions">
          <i class="fas fa-plus-circle"></i>
        </a>
        <a href="#" class="table-actions">
          <i class="fas fa-times-circle"></i>
        </a>
      </div> --}}
    </div>

  </section>
@endsection
