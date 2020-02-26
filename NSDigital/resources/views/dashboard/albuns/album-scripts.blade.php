<script>
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
