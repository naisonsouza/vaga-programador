<form class="artist_form" method="post" action="{{url('api/artist')}}" enctype="multipart/form-data">
  
  @if($page == 'edit')
    {{method_field('PUT')}}
  @endif
  {{ csrf_field() }}

  @if($page == 'view') 

    <div class="form-group">
      <label for="name">Nome</label>
      <input type="text" name="name_view" class="form-control" id="name_view" aria-describedby="emailHelp" placeholder="Nome do Artista" />
    </div>
    <div class="form-group">
      <label for="image">Image</label>
      <img id="img_artist_view" />
    </div>

  @else

    <div class="form-group">
      <label for="name">Nome</label>
      <input type="text" name="name" class="form-control" id="nameHelp" required="required" aria-describedby="emailHelp" placeholder="Nome do Artista" />
      <small id="emailHelp" class="form-text text-muted">Informe o nome do artista para cadastro.</small>
    </div>

    <div class="form-group">
      <label for="inputFile">Imagem do Artista</label>
      <input type="file" class="form-control-file" id="inputFile" required="required" name="artist_image" />
    </div>

    <div class="container-form-button">
      <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
  @endif
  
</form>