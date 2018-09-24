$(document).ready(function(){  
    //validar correo
    $("#form_login").validate({
            
        rules         : {
            userName     : { required : true},
            Password1    : { required : true}
        },
        messages      : {
            userName     : "Debe introducir un Usuario válido.",
            Password1    : "Debe introducir una contraseña"
            
        }
        
    });

    login();
    // funcion para consultar si existe una session activa al cargar la pagina y redireccionar al index
    function login(){
      $.get("controllerLogin/controllerLogin.php", function(datasession){
        // si existe un json lo parseo
        if(datasession){
          var respuesta = $.parseJSON(datasession);
          if(respuesta.success == 'ok')
          {
            $('#view').html('<div class="alert alert-success text-center">'+respuesta.message+'</div>').show(1000).delay(3000).hide(3000);
            window.location='dashboard'; 
          }
        }
      });    
}


 $('#form_login').on('submit', function(event){  
        event.preventDefault();  
        var form_data = $('#form_login').serialize();
        $.ajax({  
              url:"controllerLogin/controllerLogin.php",  
              method:"POST",  
              data:form_data,  
              success:function(data){
                console.log(data);
                
                var respuesta = $.parseJSON(data);
                console.log(respuesta)
                if(respuesta.success == 'ok')
                {
                  window.location='dashboard'; 
                }
                if(respuesta.success == 'error')
                {
                    // $('#view').html('<div class="alert alert-danger text-center">'+respuesta.message+'</div>').show(1000).delay(3000).hide(3000);
                    swal({
                        title: 'Acceso Inválido',
                        text: respuesta.message,
                        type: 'warning'
                        // buttonsStyling: false,
                        // confirmButtonClass: 'btn btn-sm btn-light',
                        // background: 'rgba(0, 0, 0, 0.96)'
                    });
                }
                else
                {
                    return;
                }
                
                  
              }  
        });  
    });  
});