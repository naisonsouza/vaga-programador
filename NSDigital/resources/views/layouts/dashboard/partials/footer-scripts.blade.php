<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script> --}}

<script>
  // $(document).on("click", document.getElementById('btn-add-music'), function(e) {
  // $(document).ready(function(){ 
  //   $('#btn-add-music').click(function(e) {
  //     console.log('bootbox', bootbox);

  //     bootbox.confirm("Are you sure?", function(confirmed) {
  //       console.log('entrou');
  //     });
  //   });
    
  // });
  
  var $input = document.getElementById('image-album'), 
      $fileName = document.getElementById('file-name');

  var $inputMusic = document.getElementById('music-file'), 
    $musicName = document.getElementById('music-name');
  
  $(document).on('change', $input, function() {
    $fileName.textContent = $input.value;
  });

  $(document).on('change', $inputMusic, function() {
    $musicName.textContent = $inputMusic.value;
  });


</script>
