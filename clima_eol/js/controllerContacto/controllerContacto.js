

$(document).ready(function(){
    
    $("#con_form2").validate({
      
      rules         : {
          con_name2      : { required : true, minlength: 2},
          con_email2     : { required : true, email    : true},
          con_mensaje2: { required:true, minlength: 2}
      },
      messages      : {
          con_name2      : "Debe introducir un nombre o empresa.",
          con_email2     : "Debe introducir un email válido.",
          con_mensaje2 : "El campo Comentario es obligatorio."
          
      }
  });

//  cuando enviamos la data del formulario de usuario
$(document).on('submit', '#con_form2', function(event){
  event.preventDefault();
  $('#btn_submit2').attr('disabled','disabled');
 
  var form_data = $(this).serialize();
  $.ajax({
      url: "controllerContacto/controllerContacto.php",
      type: 'POST',
      data: form_data,
      success: function(data)
      {  
      if (data.length >= 100){
          $('#con_form2')[0].reset();
          swal(
          "Datos del Email envíados!",
          "Gracias pronto te atenderemos!",
          "success"
          );
          $('#alert_cont2').fadeIn(2000).html(data).delay(6000).fadeOut(3000);
          $('#btn_submit2').attr('disabled', false);
      } 
      else {
          $('#con_form2')[0].reset();
          swal(
          "Error!",
          "Intente nuevamente!",
          "error"
          );
          $('#alert_cont2').fadeIn(2000).html(data).delay(6000).fadeOut(3000);
          $('#btn_submit2').attr('disabled', false);
          }
      } 
  });
  
  });


  
});