$(document).ready( function() {

  $('#keyword').on('keyup' , function() {
    $('#container').load('ajax/tagihan.php?keyword=' + $('#keyword').val());
  });


});
