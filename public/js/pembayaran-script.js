$(document).ready( function() {

  $('#keyword').on('keyup' , function() {
    $('#container').load('ajax/pembayaran.php?keyword=' + $('#keyword').val());
  });


});
