$(document).ready( function() {

  $('#keyword').on('keyup' , function() {
    $('#container').load('ajax/siswa.blade.php?keyword=' + $('#keyword').val());
  });


});
