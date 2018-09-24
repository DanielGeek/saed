

//muestra todos los datos de la tabla comentarios
$(document).ready(function() {
      
    $("#user_form").validate({
        
      rules         : {
          user_name      : { required : true, minlength: 2},
          user_email     : { required : true, email    : true},
          user_new_password: { required:true, minlength: 3},
          user_re_enter_password: { required:true, minlength: 3}
      },
      messages      : {
          user_name      : "Debe introducir un nombre o empresa.",
          user_email     : "Debe introducir un email válido.",
          user_new_password : "El campo Contraseña es obligatorio.",
          user_re_enter_password : "Confirme la contraseña. "
      }
  });

      

  var userdataTable = $('#user_data').DataTable({
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax":{
      url:"controllerPerfil/controllerGetUsuarios.php",
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
    if($('#user_new_password2').val() != $('#user_re_enter_password2').val())
    {
    $('#error_password2').fadeIn(1000).html('<div style="margin-top:20px;" class="alert alert-danger text-danger">Las Contraseñas no son iguales</div>').delay(1000).fadeOut(3000);
    return false;
    }
    $('#action').attr('disabled','disabled');
    var form_data = $(this).serialize();
    var tipo_user = $('#user_type').val();
    console.log(tipo_user);
    if(tipo_user != 'master' && tipo_user != 'user' )
    {
        $('#alert_user_type').fadeIn(1000).html('<div class="alert alert-danger">Solo se permite tipo de usuario master o user</div>').delay(1000).fadeOut(3000);
        return;
    }
    $.ajax({
     url:"controllerPerfil/controllerEditUsuarios.php",
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
      url:"controllerPerfil/controllerEditUsuarios.php",
      method:"POST",
      data:{
        user_id:user_id,
        btn_action:btn_action
      },
      dataType:"json",
      success:function(data)
      {
        //retorno la data en json, muestro el modal y los datos json en los inputs para editarlos
        console.log(data);
        $('#userModal').modal('show');
        $('#user_name2').val(data.user_name);
        $('#correo_name').val(data.user_email);
        $('#user_new_password2').val('');
        $('#user_re_enter_password2').val('');
        $('#user_type').val(data.user_type);
        $('#estatus').val(data.user_estatus);
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
                url:"controllerPerfil/controllerEditUsuarios.php",
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
            url:"controllerPerfil/controllerEditUsuarios.php",
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