$(document).ready(function(){

    $('#edit_profile_form').on('submit', function(event){
     event.preventDefault();
     if($('#user_new_password').val() != '')
     {
      if($('#user_new_password').val() != $('#user_re_enter_password').val())
      {
       $('#error_password').fadeIn(1000).html('<div style="margin-top:20px;" class="alert alert-danger text-danger">Las Contraseñas no son iguales</div>').delay(1000).fadeOut(3000);
       return false;
      }
      else
      {
       $('#error_password').html('');
      }
     }
     if($('#user_re_enter_password').val() != $('#user_new_password').val())
      {
        $('#error_password').fadeIn(1000).html('<div style="margin-top:20px;" class="alert alert-danger text-danger">Las Contraseñas no son iguales</div>').delay(1000).fadeOut(3000);
        return false;
      }
      
     $('#edit_prfile').attr('disabled', 'disabled');
     var form_data = $(this).serialize();
     $('#user_re_enter_password').attr('required',false);
     $.ajax({
      url:"controllerPerfil/controllerEditPerfil.php",
      method:"POST",
      data:form_data,
      success:function(data)
      {
       $('#edit_prfile').attr('disabled', false);
       $('#user_new_password').val('');
       $('#user_re_enter_password').val('');
       $('#message').fadeIn(1000).html(data).delay(1000).fadeOut(3000);
      }
     })
    });
   });