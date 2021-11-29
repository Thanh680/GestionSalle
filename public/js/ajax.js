jQuery(document).ready(function(){

    jQuery('#ajaxSubmit').click(function(e){
       e.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
        // addSalle
      jQuery.ajax({
        url: "{{ url('/addsalle/post') }}",
        method: 'post',
        data: {
           batiment: jQuery('#batiment').val(),
           etage: jQuery('#etage').val(),
           num: jQuery('#num').val(),
           nom: jQuery('#nom').val()
        },
        success: function(result){
           jQuery('.alert').show();
           jQuery('.alert').html(result.success);
        }});
        // FIN addSalle
    });
  });