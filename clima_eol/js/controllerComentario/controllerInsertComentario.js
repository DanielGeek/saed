

$(document).ready(function(){
    
    $("#con_form").validate({
      
      rules         : {
          con_name      : { required : true, minlength: 2},
          con_tel     : { required : true, minlength: 7},
          con_email     : { required : true, email    : true},
          con_mensaje: { required:true, minlength: 2}
      },
      messages      : {
          con_name      : "Debe introducir un nombre o empresa.",
          con_tel       : "Debe introducir un telefono.",
          con_email     : "Debe introducir un email válido.",
          con_mensaje : "El campo Comentario es obligatorio."
          
      }
  });

//  cuando enviamos la data del formulario de usuario
$(document).on('submit', '#con_form', function(event){
  event.preventDefault();
  $('#submit_comentario').attr('disabled','disabled');
 
  var form_data = $(this).serialize();
  $.ajax({
      url: "controllerComentario/controllerInsertComentario.php",
      type: 'POST',
      data: form_data,
      success: function(data)
      {  
      if (data.length >= 100){
          $('#con_form')[0].reset();
          swal(
          "Datos del Email envíados!",
          "Gracias pronto te atenderemos!",
          "success"
          );
          $('#alert_cont').fadeIn(2000).html(data).delay(6000).fadeOut(3000);
          $('#submit_comentario').attr('disabled', false);
      } 
      else {
          $('#con_form')[0].reset();
          swal(
          "Error!",
          "Intente nuevamente!",
          "error"
          );
          $('#alert_cont').fadeIn(2000).html(data).delay(6000).fadeOut(3000);
          $('#submit_comentario').attr('disabled', false);
          }
      } 
  });
  
  });


  
});