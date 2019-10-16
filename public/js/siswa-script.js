$(document).ready( function() {

  $('#keyword').on('keyup' , function() {

    $.ajax({
         type: "POST",
         url: "{{ url('/siswa/search') }}",
         data: "keyword=" + $('#keyword').val();
         success: function(response){
              console.log('berhasil');
        }

    });

  });


});
