<script>
  var modal = document.getElementById("modalArtists");
  var span = document.getElementsByClassName("closeModal")[0];
  var modalEdit = document.getElementById("modalEditAlbum");
  var span2 = document.getElementsByClassName("closeModal")[1];

  if (span) { span.onclick = function() { modal.style.display = "none"; } }
  if (span2) { span2.onclick = function() { modalEdit.style.display = "none"; } }
  window.onclick = function(event) {
    if (event.target == modal || event.target == modalEdit) {
      modal.style.display = "none"; 
      modalEdit.style.display = "none"; 
    }
  }

  $('#btn-create-album').click(function() {
    $('#list_artits').empty();
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
    $('#musics_table tbody').empty();
    $.ajax({
      type: 'get', url: 'http://127.0.0.1:8000/api/album/'+id+'/edit',
      success: function (data) {
        $('.album_form').attr('id', 'album_form_edit');
        $('#album_form_edit').attr('action', 'http://127.0.0.1:8000/api/album/'+id);

        $('#artist_id').val(data.artist_id);
        $('#title-album').val(data.title);
        $('#filename').text(data.original_filename);
        
        data.musics.forEach(function(music) {
          $('#musics_table tbody').append(
            '<tr class="row_table" id="'+music.id+'"><td><i class="fa fa-music"></i></td><td class="music_title_td">'+ music.title +'</td>'
             +'<td><input type="text" disabled value="'+ music.title +'.mp3" /></td></tr>'
          )
        });
        modalEdit.style.display = "block";
      },
      error: function (data) { toastr.error('Erro:' + data); }
    });

    $(document).on('change','.form-control-file', function(e){
      title = $(this).closest('tr').find("td:eq(1)").text();
      //file = $('#music_archive_'+$('table > tbody > tr').length).prop('files')[0];

      $.ajax({
        type: 'post',
        enctype: 'multipart/form-data',
        url: 'http://127.0.0.1:8000/api/music/saveMusic',
        data: {
          'title': title,
          'id': id,
        },
        dataType: 'JSON',
        success: function (data) {
          console.log(data);
        },
        error: function (data) { console.log(data); }
      });
    });
    
    $(document).on('click','.music_title_td', function(e){ 
      var tr = $(this).closest('tr'), del_id = $(this).attr('id');
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
    var tr = $(this).closest('tr'), del_id = $(this).attr('id');
    if(confirm("Tem certeza que deseja deletar esse álbum? "))
    { 
      $.ajax({
        type: 'delete', url: 'http://127.0.0.1:8000/api/album/'+ del_id,
        success: function (data) { 
          tr.fadeOut(1000, function(){ $(this).remove(); }); 
          toastr.info('Sucesso ao excluir!');
        },
        error: function (data) { toastr.error('Erro: ' + data); }
      });
    }
  });
</script>
