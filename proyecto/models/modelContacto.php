<?php

 
class contacto {

    // metodo para insertar contactos desde el formulario contacto
    public function insertContacto() {
        $name = '';
        $apellido = '';
        $email = '';
        $tel = '';
        $message = '';
        $mensaje = '';
        $respuesta = '';
        $array_respuesta = array();
        
        $name = $_POST["name"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $tel = $_POST["phone"];
        $mensaje = $_POST["message"];
        
        // limpio los caracteres especiales
        $name_clear = self::clean_text($name);
        $apellido_clear = self::clean_text($apellido);
        $email_clear = self::clean_text($email);
        $tel_clear = self::clean_text($tel);
        $mensaje_clear = self::clean_text($mensaje);

        if(isset($email_clear) && $email_clear != '' && self::check_email($email_clear))
        {
            if(isset($name_clear) && $name_clear != '')
            {
                if(isset($mensaje_clear) && $mensaje_clear != '')
                {
                    $ip = $_SERVER["REMOTE_ADDR"];
                    //    $path = 'upload/' . $_FILES["resume"]["name"];
                    //    move_uploaded_file($_FILES["resume"]["tmp_name"], $path);           
                    $message = '
                        <h3 align="center">Información del Contacto</h3>
                        <table border="1" width="100%" cellpadding="5" cellspacing="5">
                            <tr>
                                <td style="padding-left:10px;" width="30%">Nombre</td>
                                <td style="padding-left:10px;" width="70%">'.$name_clear.'</td>
                            </tr>
                            <tr>
                                <td style="padding-left:10px;" width="30%">Apellido</td>
                                <td style="padding-left:10px;" width="70%">'.$apellido_clear.'</td>
                            </tr>
                            <tr>
                                <td style="padding-left:10px;" width="30%">Email</td>
                                <td style="padding-left:10px;" width="70%">'.$email_clear.'</td>
                            </tr>
                            <tr>
                                <td style="padding-left:10px;" width="30%">Teléfono</td>
                                <td style="padding-left:10px;" width="70%">'.$tel_clear.'</td>
                            </tr>
                            <tr>
                                <td style="padding-left:10px;" width="30%">Comentario</td>
                                <td style="padding-left:10px;" width="70%">'.$mensaje_clear.'</td>
                            </tr>
                            <tr>
                                <td style="padding-left:10px;" width="30%">Ip</td>
                                <td style="padding-left:10px;" width="70%">'.$ip.'</td>
                            </tr>
                            
                        </table>
                    ';

                    // require ("../models/phpmailer/class.phpmailer.php");
                    // require ("../models/phpmailer/class.smtp.php");
                    $mail = new PHPMailer();
                    $mail->IsSMTP();	                            //Sets Mailer to send message using SMTP
                    $mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
                    $mail->Port = '587';							//Sets the default SMTP server port	
                    $mail->SMTPSecure = 'tls';		                //Definmos la seguridad como TLS
                    $mail->SMTPAuth = true;                         //Usar autenticación SMTP
                    $mail->SMTPOptions = array(
                        'ssl' => array('verify_peer' => false,'verify_peer_name' => false,'allow_self_signed' => true)
                    );//opciones para "saltarse" comprobación de certificados (hace posible del envío desde localhost)
                    //Esto es para activar el modo depuración. En entorno de pruebas lo mejor es 2, en producción siempre 0
                    // 0 = off (producción)
                    // 1 = client messages
                    // 2 = client and server messages
                    $mail->SMTPDebug  = 0;
                    $mail->CharSet = 'UTF-8';
                    $mail->Host = 'smtp.gmail.com';
                    //Sets the SMTP hosts of your Email hosting, this for gmail	
                    //El puerto será el 465 ya que usamos encriptación TLS
                    //El puerto 587 es soportado por la mayoría de los servidores SMTP y es útil para conexiones no encriptadas (sin TLS)

                    
                    $mail->Username = 'pruebaamarok@gmail.com';		//Sets SMTP username
                    $mail->Password = 'amarok123';					//Sets SMTP password
                    $mail->setFrom('no-reply@focoestrategico.cl', 'Contacto Serviciosaed.cl');
                    $mail->From = $email_clear;					//Sets the From email address for the message
                    $mail->FromName = $name_clear;				//Sets the From name of the message
                    $mail->AddAddress('pruebaamarok@gmail.com', 'amarokdatacenter.cl');		//Adds a "To" address
                    $mail->AddAddress('luis@focoestrategico.cl', 'focoestrategico.cl');		//Adds a "To" address
                    //Para enviar un correo formateado en HTML lo cargamos con la siguiente función. Si no, puedes meterle directamente una cadena de texto.
                    $mail->MsgHTML($message);
                    //Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) una versión alternativa en texto plano (también será válida para lectores de pantalla)
                    $mail->AltBody = $message;
                    $mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
                    $mail->IsHTML(true);							//Sets message type to HTML
            //    	$mail->AddAttachment($path);					//Adds an attachment from a path on the filesystem
                    $mail->Subject = 'Nuevo Formulario Serviciosaed';			//Sets the Subject of the message
                    $mail->Body = $message;							//An HTML or plain text message body
                    if($mail->Send())								//Send an Email. Return true on success or false on error
                    {
                        
                         $message = '<div class="alert alert-success text-center">Mensaje Enviado , Nos pondremos en contacto con usted a la brevedad.</div>';
                         $message_plano = 'Nos pondremos en contacto con usted a la brevedad.';
                        // echo $json;
                        $respuesta = 'ok';
                        
            //            unlink($path);
                    }
                    else
                    {
                         $message = '<div class="alert alert-danger text-center">Error al intentar enviar el email</div>';
                         $mail_error = $mail->ErrorInfo;
                         $message_plano = 'Error al intentar enviar el email '.$mail_error;
                    }
                }
                else
                {
                     $message = '<div class="alert alert-danger text-center">Escriba un Mensaje </div>';
                     $message_plano = 'Escriba un Mensaje';
                }
            }
            else
            {
                 $message = '<div class="alert alert-danger text-center">Escriba un Nombre </div>';
                 $message_plano = 'Escriba un Nombre';
            }
        }
        else
        {
             $message = '<div class="alert alert-danger text-center">Escriba un Email Valido</div>';
             $message_plano = 'Escriba un Email Valido';
        }

        $array_respuesta = array(
            'message'   => $message,
            'message_plano' => $message_plano,
            'respuesta' => $respuesta
        );
        return json_encode($array_respuesta);

    }
    // fin metodo para insertar contactos desde el formulario contacto

     // funcion para limpiar caracteres especiales
     public function clean_text($string)
     {
         $string = trim($string);
         $string = stripslashes($string);
         $string = htmlspecialchars($string);
         return $string;
     }

     //funciona para check si el email es valido y los dns son correctos cuando no es gmail
    public function check_email($email) {  
        if(preg_match('/^\w[-.\w]*@(\w[-._\w]*\.[a-zA-Z]{2,}.*)$/', $email, $matches))  
        {  
            if(function_exists('checkdnsrr'))  
            {  
                if(checkdnsrr($matches[1] . '.', 'MX')) return true;  
                if(checkdnsrr($matches[1] . '.', 'A')) return true;  
            }else{  
                if(!empty($hostName))  
                {  
                    if( $recType == '' ) $recType = "MX";  
                    exec("nslookup -type=$recType $hostName", $result);  
                    foreach ($result as $line)  
                    {  
                        if(eregi("^$hostName",$line))  
                        {  
                            return true;  
                        }  
                    }  
                    return false;  
                }  
                return false;  
            }  
        }  
        return false;  
    }

}

?>