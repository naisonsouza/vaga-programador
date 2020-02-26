<script>
  var modal = document.getElementById("modalArtists");
  var span = document.getElementsByClassName("close")[0];

  if (span) {
    span.onclick = function() { modal.style.display = "none"; }
  }
  window.onclick = function(event) {
    if (event.target == modal) { modal.style.display = "none"; }
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
      '<tr><td scope="row"><i class="fa fa-music"></i></td>'
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
</script>
