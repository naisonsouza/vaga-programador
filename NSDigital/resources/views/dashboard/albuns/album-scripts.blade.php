<script>
  $('#btn-add-music').click(function() {
    $('#musics_table > tbody:last-child').append(
      '<tr><td scope="row"><i class="fa fa-music"></i></td><td>'+$('#title_music').val()+'</td></tr>'
    );
    $('#title_music').val('');
    $('#title_music').focus();
  });
</script>
