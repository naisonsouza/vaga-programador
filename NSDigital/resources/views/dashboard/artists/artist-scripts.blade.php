<script>
  var modal = document.getElementById("myModal");
  var viewModal = document.getElementById("viewModal");
  var span = document.getElementsByClassName("close")[0];
  var span2 = document.getElementsByClassName("close")[1];

  span.onclick = function() { modal.style.display = "none"; }
  span2.onclick = function() { viewModal.style.display = "none"; }
  window.onclick = function(event) {
    if (event.target == modal || event.target == viewModal) { 
      modal.style.display = "none"; 
      viewModal.style.display = "none"; 
    }
  }

  var page = document.getElementById('page').value;

  $('.edit_button').click(function() {
    var id = $(this).attr('id');
    $.ajax({
      type: 'get', url: 'http://127.0.0.1:8000/api/'+page+'/'+id+'/edit',
      success: function (data) {
        $('.artist_form').attr('id', 'artist_form_edit');
        $('#nameHelp').val(data.name);
        $('#artist_form_edit').attr('action', 'http://127.0.0.1:8000/api/'+page+'/'+data.id);
        modal.style.display = "block";
      },
      error: function (data) { console.log(data); }
    });
  });

  $('.remove_button').click(function() {
    var tr = $(this).closest('tr'), del_id = $(this).attr('id');

    if(confirm("Tem certeza que deseja deletar esse artista? "))
    { 
      $.ajax({
        type: 'delete', url: 'http://127.0.0.1:8000/api/' + page + '/' + del_id,
        success: function (data) { tr.fadeOut(1000, function(){ $(this).remove(); }); },
        error: function (data) { console.log(data); }
      });
    }
  });

  $('.view_button').click(function() { 
    var id = $(this).attr('id');
    $.ajax({
      type: 'get', url: 'http://127.0.0.1:8000/api/'+page+'/'+id,
      success: function (data) {
        $('.artist_form').attr('id', 'artist_form_view');
        $('#name_view').val(data.name);
        $('#name_view').prop('disabled', true);
        $('#img_artist_view').attr('src', 'storage/uploads/artist/'+data.filename);
        $('#img_artist_view').attr('alt', data.original_filename);
        
        viewModal.style.display = "block";
      },
      error: function (data) { console.log(data); }
    });
  });
</script>
