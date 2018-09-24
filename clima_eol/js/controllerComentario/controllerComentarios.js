

//muestra todos los datos de la tabla comentarios
$(document).ready(function() {
      
      $("#user_form").validate({
          
        rules         : {
            user_name      : { required : true, minlength: 2},
            user_email     : { required : true, email    : true},
            user_textarea: { required:true, minlength: 2}
        },
        messages      : {
            user_name      : "Debe introducir un nombre o empresa.",
            user_email     : "Debe introducir un email válido.",
            user_textarea : "El campo Comentario es obligatorio."
            
        }
    });

    var userdataTable = $('#user_data').DataTable({
      "processing": true,
      "serverSide": true,
      "order": [],
      "ajax":{
        url:"controllerComentario/controllerGetComentarios.php",
        type:"POST"
      },
      "columnDefs":[
        {
          "target":[4,7], //numero de columnas que se muestran, contadas desde 0
          "orderable":false
        }
      ],
      "pageLength":5 //maximo filas a mostrar en una vista
    });
    
    
  
    
    // cuando enviamos la data del formulario de usuario en el modal
    $(document).on('submit', '#user_form', function(event){
      event.preventDefault();
      $('#action').attr('disabled','disabled');
      var form_data = $(this).serialize();
      $.ajax({
       url:"controllerComentario/controllerEditComentarios.php",
       method:"POST",
       data:form_data,
       success:function(data)
       {
         //el formulario esta enlazado con el evento click en la clase .update, cambiamos los valores de los inputos luego de editar a Add
        $('#btn_action').val('');
        $('#action').val('Add');
        $('.modal-title').html("<i class='fa fa-plus'></i> Agregar Usuario");
        $('#user_form')[0].reset();
        $('#userModal').modal('hide');
        $('#alert_action').fadeIn(1000).html('<div class="alert alert-success">'+data+'</div>').delay(1000).fadeOut(3000);
        $('#action').attr('disabled', false);
        userdataTable.ajax.reload();
       }
      })
     });

    // edita un usuario
    $(document).on('click', '.update', function(){
      var user_id = $(this).attr("id");
      var btn_action = 'fetch_single';
      $.ajax({
        url:"controllerComentario/controllerEditComentarios.php",
        method:"POST",
        data:{
          user_id:user_id,
          btn_action:btn_action
        },
        dataType:"json",
        success:function(data)
        {
          //retorno la data en json, muestro el modal y los datos json en los inputs para editarlos
          $('#userModal').modal('show');
          $('#user_name').val(data.user_name);
          $('#user_email').val(data.user_email);
          $('#user_textarea').val(data.user_textarea);
          $('.modal-title').html("<i class='fa fa-pencil-square-o'></i>Editar Usuario");
          $('#user_id').val(user_id);
          $('#action').val('Edit');
          $('#btn_action').val('Edit');
        }
      });
    });

    $(document).on('click', '.delete', function(){
      var user_id = $(this).attr("id");
      var status = $(this).data('status');
      var btn_action = "delete";
      if(confirm("¿Seguro quieres cambiar el estatus?")){
              $.ajax({
                  url:"controllerComentario/controllerEditComentarios.php",
                  method:"POST",
                  data:{user_id:user_id, status:status,
                      btn_action:btn_action},
                  success:function(data){
                      $("#alert_action").fadeIn(1000).html('<div class="alert alert-info">'+data+'</div>').delay(1000).fadeOut(3000);
                      userdataTable.ajax.reload();
                  }
              })
      } else {
          return false;
      }
 });

 $(document).on('click', '.borrar', function(){
  var user_id = $(this).attr("id");
  var btn_action = "borrar";
  if(confirm("¿Seguro quieres Eliminar el Contacto?")){
          $.ajax({
              url:"controllerComentario/controllerEditComentarios.php",
              method:"POST",
              data:{user_id:user_id,
                  btn_action:btn_action},
              success:function(data){
                  $("#alert_action").fadeIn(1000).html('<div class="alert alert-info">'+data+'</div>').delay(1000).fadeOut(3000);
                  userdataTable.ajax.reload();
              }
          })
  } else {
      return false;
  }
});

  });