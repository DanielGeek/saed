

$(document).ready(function(){
    
//     $("#con_form2").validate({
      
//       rules         : {
//           con_name2      : { required : true, minlength: 2},
//           con_email2     : { required : true, email    : true},
//           con_mensaje2: { required:true, minlength: 2}
//       },
//       messages      : {
//           con_name2      : "Debe introducir un nombre o empresa.",
//           con_email2     : "Debe introducir un email válido.",
//           con_mensaje2 : "El campo Comentario es obligatorio."
          
//       }
//   });

//  cuando enviamos la data del formulario de usuario

$(document).on('submit', '#form_contacto', function(event){
  event.preventDefault();
  
  //si la validacion tiene mensajes de error
  if($('.form-validation').text() != '')
  {
      return;
  }

  $('#form-output-global').html('<p><span class="icon text-middle fa fa-circle-o-notch fa-spin icon-xxs"></span><span>Enviando</span></p>');
  $('#form-output-global').addClass("active");  
  $('#btn_enviar').attr('disabled','disabled');
  $('.div_btn_enviar').hide(3000);

  var form_data = $(this).serialize();
  $.ajax({
      url: 'controllers/controllerContacto.php',
      type: 'POST',
      data: form_data,
      success: function(data)
      {
          
        var parsedata = $.parseJSON(data);
        if (parsedata.respuesta == 'ok'){
            $('#form_contacto')[0].reset();
            swal(
            'Datos del Email envíados!',
            parsedata.message_plano,
            'success'
            );
            //   $('#respuesta').fadeIn(3000).html(parsedata.message).delay(6000).fadeOut(3000);
            $('#form-output-global').removeClass("active");
            $('#form-output-global').html("");
            $('#btn_enviar').attr('disabled', false);
            $('.div_btn_enviar').show(3000);
        } 
        else {
            $('#form_contacto')[0].reset();
            swal(
            'Error!',
            parsedata.message_plano,
            'error'
            );
            //   $('#respuesta').fadeIn(3000).html(parsedata.message).delay(6000).fadeOut(6000);
            $('#form-output-global').removeClass("active");
            $('#form-output-global').html("");
            $('#btn_enviar').attr('disabled', false);
            $('.div_btn_enviar').show(3000);
            }
        } 
  });
  
  });


  
});