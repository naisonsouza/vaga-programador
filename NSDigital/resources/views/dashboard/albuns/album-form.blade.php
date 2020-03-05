<form class="form album_form" method="post" action="{{url('api/album')}}" enctype="multipart/form-data">
  @if($page == 'edit')
    {{method_field('PUT')}}
  @endif

  <div class="col-md-4 form-album">
    <div class="form-input-file">
      <label for="album_image" class="label-input-file">
        <i class="fas fa-compact-disc"></i>
        
        <span id="filename">Imagem do Álbum</span>
      </label>
      <input type="file" id="album_image" name="album_image" class="form-control-file" />
    </div>
    <div class="form-input-title">
      {{-- <label for="title-album">Titúlo do Album</label> --}}
      <input type="text" id="title-album" name="title" class="form-control-file" aria-describedby="formlHelp" placeholder="Titúlo do Álbum..." />
    </div>
    <small id="formlHelp" class="form-text text-muted">Antes de salvar, adicione música(s) ao lado.</small>

    <div class="container-form-button">
      <button type="submit" class="btn btn-primary">Salvar</button>
    </div>

    @if($errors->any())
      <h4>{{$errors->first()}}</h4>
    @endif
    
  </div>
  <div class="col-md-7">
    <div class="form-music">
      <div class="form-music-input-container">
        <div class="form-input">
          <input type="text" id="title_music" name="title_music" class="input-title-music" aria-describedby="formlHelp" placeholder="Titúlo da música..." />
        </div>

        {{-- <div class="form-input-file">
          <label for="music_file" class="label-input-file">
            <i class="fa fa-save"></i>
            <span id="music_name">Escolher o arquivo...</span>
          </label>
          <input type="file" id="music_file" name="music_file" class="form-control-file" />
        </div> --}}
      </div>

      <a href="#" id="btn-add-music">
        <i class="fas fa-plus-circle"></i>
      </a>
    </div>
    <input type="hidden" name="musics_title[]" id="musics_title_array" />
    <div class="table-musics table-responsive table-hover">
      <table id="musics_table" class="table">
        <thead>
          <tr>
            <th scope="col">
              <i class="fa fa-music"></i>
            </th>
            <th scope="col">Titúlo</th>
            <th scope="col">Arquivo - MP3</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>
    </div>
  </div>
  <input type="hidden" id="artist_id" name="artist_id" value="{{app('request')->input('id')}}" />
</form>
