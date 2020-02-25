<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script> --}}

<script> 
  var $input = document.getElementById('album_image'), 
  $fileName = document.getElementById('filename');
  var $inputMusic = document.getElementById('music_file'), 
  $musicName = document.getElementById('music_name');
  
  $(document).on('change', $input, function() { $fileName.textContent = $input.value; });
  // $(document).on('change', $inputMusic, function() { $musicName.textContent = $inputMusic.value; });

</script>
