

//muestra todos los datos de la tabla comentarios
$(document).ready(function() {
      
      // funcion para mostrar telefonos activos en el front del index
      TelActivos();

      function TelActivos() {
        $.ajax({
          url:"controllerTelefono/controllerGetTelActivos.php",
          success:function(data) {
            $('.telefonos').append(data);
          }
        });
      }

      $("#user_form2").validate({
              
        rules         : {
            user_tel         : { required : true, minlength: 7},
            user_ws         : { required : true, minlength: 7},
            user_name2      : { required : true, minlength: 2},
            user_email2      : { required : true, email    : true},
            user_textarea2   : { required:true, minlength: 2}
        },
        messages      : {
            user_tel       : "Debe introducir un telefono.",
            user_ws       : "Debe introducir un WhatsApp.",
            user_name2      : "Debe introducir un nombre o empresa.",
            user_email2     : "Debe introducir un email válido.",
            user_textarea2 : "El campo Comentario es obligatorio."
            
        }
    });
    var userdataTable = $('#user_data2').DataTable({
      "processing": true,
      "serverSide": true,
      "order": [],
      "ajax":{
        url:"controllerTelefono/controllerGetTelefonos.php",
        type:"POST"
      },
      "columnDefs":[
        {
          "target":[4,9], //numero de columnas que se muestran, contadas desde 0
          "orderable":false
        }
      ],
      "pageLength":5 //maximo filas a mostrar en una vista
    });
    
    
  
    
    // Agregar usuario, cuando enviamos la data del formulario de usuario en el modal
    $(document).on('submit', '#user_form2', function(event){
      event.preventDefault();
      $('#action2').attr('disabled','disabled');
      var form_data = $(this).serialize();
      $.ajax({
       url:"controllerTelefono/controllerEditTelefonos.php",
       method:"POST",
       data:form_data,
       success:function(data)
       {
         //el formulario esta enlazado con el evento click en la clase .update, cambiamos los valores de los inputos luego de editar a Add
        $('#btn_action2').val('');
        $('#action2').val('Add');
        $('.modal-title').html("<i class='fa fa-plus'></i> Agregar Usuario");
        $('#user_form2')[0].reset();
        $('#userModal2').modal('hide');
        $('#alert_action2').fadeIn(1000).html('<div class="alert alert-success">'+data+'</div>').delay(1000).fadeOut(3000);
        $('#action2').attr('disabled', false);
        userdataTable.ajax.reload();
       }
      })
     });

    // Modal para editar un usuario
    $(document).on('click', '.update2', function(){
      var user_id2 = $(this).attr("id");
      var btn_action2 = 'fetch_single';
      $.ajax({
        url:"controllerTelefono/controllerEditTelefonos.php",
        method:"POST",
        data:{
          user_id2:user_id2,
          btn_action2:btn_action2
        },
        dataType:"json",
        success:function(data)
        {
          //retorno la data en json, muestro el modal y los datos json en los inputs para editarlos
          $('#userModal2').modal('show');
          $('#user_tel').val(data.user_tel);
          $('#user_ws').val(data.user_ws);
          $('#user_name2').val(data.user_name);
          $('#user_email2').val(data.user_email);
          $('#user_textarea2').val(data.user_textarea);
          $('.modal-title-telefonos').html("<i class='fa fa-pencil-square-o'></i>Editar Usuario");
          $('#user_id2').val(user_id2);
          $('#action2').val('Edit');
          $('#btn_action2').val('Edit');
          
        }
      });
    });

      //borrar cambiar estatus
      $(document).on('click', '.delete2', function(){
        var user_id2 = $(this).attr("id");
        var status = $(this).data('status');
        var btn_action2 = "delete2";
        if(confirm("¿Seguro quieres cambiar el estatus?")){
                $.ajax({
                    url:"controllerTelefono/controllerEditTelefonos.php",
                    method:"POST",
                    data:{user_id2:user_id2, status:status,
                        btn_action2:btn_action2},
                    success:function(data){
                        $("#alert_action2").fadeIn(1000).html('<div class="alert alert-info">'+data+'</div>').delay(1000).fadeOut(3000);
                        userdataTable.ajax.reload();
                       
                    }
                })
        } else {
            return false;
        }
  });

  //borrar fila seleccionada de la tabla 
  $(document).on('click', '.delete3', function(){
      var user_id2 = $(this).attr("id");
      var btn_action2 = "delete3";
      if(confirm("¿Seguro quieres Eliminar el Contacto?")){
              $.ajax({
                  url:"controllerTelefono/controllerEditTelefonos.php",
                  method:"POST",
                  data:{user_id2:user_id2,
                      btn_action2:btn_action2},
                  success:function(data){
                      $("#alert_action2").fadeIn(1000).html('<div class="alert alert-info">'+data+'</div>').delay(1000).fadeOut(3000);
                      userdataTable.ajax.reload();
                  }
              })
      } else {
          return false;
      }
  });


  });