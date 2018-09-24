$(document).ready(function()
    {
        //validar correo
        $("#form_login").validate({
            
            rules         : {
                userName     : { required : true, email    : true},
                Password1    : { required : true}
            },
            messages      : {
                userName     : "Debe introducir un email válido.",
                Password1    : "Debe introducir una contraseña"
                
            }
        });
});