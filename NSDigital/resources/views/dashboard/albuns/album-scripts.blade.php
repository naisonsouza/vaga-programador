<script>
  var modal = document.getElementById("modalArtists");
  var span = document.getElementsByClassName("close")[0];
  var modalEdit = document.getElementById("modalEditAlbum");
  var span2 = document.getElementsByClassName("close")[1];

  if (span) { span.onclick = function() { modal.style.display = "none"; } }
  if (span2) { span2.onclick = function() { modalEdit.style.display = "none"; } }
  window.onclick = function(event) {
    if (event.target == modal || event.target == modalEdit) {
      modal.style.display = "none"; 
      modalEdit.style.display = "none"; 
    }
  }

  $('#btn-create-album').click(function() {
    $.ajax({
      type: 'get', url: 'http://127.0.0.1:8000/api/artists/list',
      success: function (data) {
        data.forEach(function(artist) {
          $('#list_artits').append('<option value="'+artist.id+'">'+artist.name+'</option>');
        });
        modal.style.display = "block";
      },
      error: function (data) { console.log(data); }
    });
  });

  $('#btn-select-artist').click(function() {
    window.location.replace("http://127.0.0.1:8000/new-album?id="+$("#list_artits option:selected").val());
  });

  $('#btn-add-music').click(function() {
    $('#musics_table > tbody:last-child').append(
      '<tr class="row_table"><td scope="row"><i class="fa fa-music"></i></td>'
      +'<td class="music_title_td">' +$('#title_music').val() +'</td>'
      +'<td class="form-input-file"><input type="file" name="music_archive_'
      +($('table > tbody > tr').length+1) +'" id="music_archive_'
      +($('table > tbody > tr').length+1) +'" class="form-control-file" />'
      +'</td></tr>'
    );
    $('#title_music').val('');
    $('#title_music').focus();

    var musicsTitleArray = [];
    $('table > tbody > tr').each(function(index, tr) { 
      musicsTitleArray.push($(this).find('.music_title_td').html()+' -'); 
    });
    $('#musics_title_array').val(musicsTitleArray);
  });

  $('.edit_button').click(function() {
    var id = $(this).attr('id');
    $.ajax({
      type: 'get', url: 'http://127.0.0.1:8000/api/album/'+id+'/edit',
      success: function (data) {
        $('.album_form').attr('id', 'album_form_edit');
        $('#album_form_edit').attr('action', 'http://127.0.0.1:8000/api/album/'+id);

        $('#artist_id').val(data[0].artist_id);
        $('#title-album').val(data[0].title);
        $('#filename').text(data[0].original_filename);
        
        data[0].musics.forEach(function(music) {
          $('#musics_table tbody').append(
            '<tr class="row_table" id="'+music.id+'"><td><i class="fa fa-music"></i></td><td class="music_title_td">'+ music.title +'</td>'
             +'<td><input type="text" disabled value="'+ music.title +'.mp3" /></td></tr>'
            //  +'<td><button type="button" class="btn_remove_music">Excluir Música</button></td></tr>'
          )
        });
        modalEdit.style.display = "block";
      },
      error: function (data) { console.log(data); }
    });

    $(document).on('change','.form-control-file', function(e){ 
      var tr = $(this).closest('tr');
      title = tr.find("td:eq(1)").text();
      file = e.target.files[0];
      id = id;
      $.ajax({
        type: 'post', 
        url: 'http://127.0.0.1:8000/api/music/saveMusic',
        data: { title: "title", file: "file", id: "id" },
        success: function (data) {
          console.log(data);
        },
        error: function (data) { console.log(data); }
      });
    });
    
    $(document).on('click','.music_title_td', function(e){ 
      var tr = $(this).closest('tr'), del_id = tr.attr('id');
      if(confirm("Tem certeza que deseja remover essa música? "))
      { 
        $.ajax({
          type: 'delete', url: 'http://127.0.0.1:8000/api/music/'+ del_id,
          success: function (data) { tr.fadeOut(1000, function(){ $(this).remove(); }); },
          error: function (data) { console.log(data); }
        });
      }
    });
  });  

  $('.remove_button').click(function() {
    if(confirm("Tem certeza que deseja deletar esse álbum? "))
    { 
      $.ajax({
        type: 'delete', url: 'http://127.0.0.1:8000/api/album/'+ del_id,
        success: function (data) { tr.fadeOut(1000, function(){ $(this).remove(); }); },
        error: function (data) { console.log(data); }
      });
    }
  });
</script>
