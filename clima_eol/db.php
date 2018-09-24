<?php
class Conectar{
    public static function conexion(){
        //coneccion local
        // $conexion=new mysqli("localhost", "root", "", "aire");

        //conexion remota
        $conexion=new mysqli("localhost", "co-servicio", "m9a7r5s3", "co-servicio");
        
        //conexion remota local
        // $conexion=new mysqli("co-servicio.cl", "co-servicio", "m9a7r5s3", "co-servicio");
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }

}
 
class aire{
 private $db;

    public function __construct(){
       $this->db=Conectar::conexion();
    }

    public function getDB(){
        return $this->db;
    }

    // metodos para los usuarios
    //inicio Modal  /insertar/editar/borrar usuario
    public function ModalEditUsuarios() {
        $query = '';
        $query_editar = '';
        $output = array();
        //si viene vacio es porque agrega un nuevo usuario
        if($_POST['btn_action'] == '')
        {
            $query_agregar = "
            INSERT INTO usuario (correo_name, user_password, user_name, user_type, estatus) 
            VALUES ('".$_POST["user_email"]."', '".password_hash($_POST["user_new_password2"], PASSWORD_DEFAULT)."',
                    '".$_POST["user_name"]."', '".$_POST["user_type"]."', '".$_POST["estatus"]."' );
            "; 
            $consultaAgregar = $this->db->query($query_agregar);
            
            if(isset($consultaAgregar))
            {
            echo 'Nuevo Usuario Agregado';
            }
        }

        if($_POST['btn_action'] == 'fetch_single')
        {
            
            $query = "SELECT * FROM usuario WHERE id ='".$_POST['user_id']."'";
            
            //ejecutamos la consulta
            $consulta = $this->db->query($query);
            $respuesta = $consulta->fetch_all(MYSQLI_ASSOC);
            
            foreach($respuesta as $row)
            {
                $output['user_email'] = $row['correo_name'];
                $output['user_name'] = $row['user_name'];
                $output['user_type'] = $row['user_type'];
                $output['user_estatus'] = $row['estatus'];
            }
            
            echo json_encode($output);   
            
        }
        
        if($_POST['btn_action'] == 'Edit')
        {
            if($_POST['user_new_password2'] != ''){
                $query_editar = "UPDATE usuario SET correo_name = '".$_POST["user_email"]."',
                    user_password = '".password_hash($_POST["user_new_password2"], PASSWORD_DEFAULT)."',
                    user_name = '".$_POST["user_name"]."',
                    user_type = '".$_POST["user_type"]."',
                    estatus = '".$_POST["estatus"]."'
                    WHERE id = '".$_POST["user_id"]."' ";
            }
            else{
                $query_editar = "UPDATE usuario SET correo_name = '".$_POST["user_email"]."',
                    user_name = '".$_POST["user_name"]."',
                    user_type = '".$_POST["user_type"]."',
                    estatus = '".$_POST["estatus"]."'
                    WHERE id = '".$_POST["user_id"]."' ";
            }
            
            
            $consultaEditar = $this->db->query($query_editar);
            // $respuestaEditar = $consultaEditar->fetch_all(MYSQLI_ASSOC);
            if(isset($consultaEditar))
            {
                echo 'Usuario Editado';
            }
        }

        if($_POST['btn_action'] == 'delete'){
        
            $status = 'Activo';
            if($_POST['status'] == 'Activo'){
                
                $status = 'Inactivo';
            }
            $query_estatus = "
                update usuario
                set estatus = '".$status."'
                where id = '".$_POST["user_id"]."'
            ";
                
            $result = $this->db->query($query_estatus);
            if(isset($result)){
                
                echo 'Estatus Cambiado a ' . $status;
            }
        }

        // condicion para eliminar la fila seleccionada
        if($_POST['btn_action'] == 'borrar'){
        
            $query_delete = "
                delete  from usuario
                where id = '".$_POST["user_id"]."'
            ";
                
            $result = $this->db->query($query_delete);
            if(isset($result)){
                
                echo 'Datos Eliminados ';
            }
        }

    }
    //fin Modal  /insertar/editar/borrar usuario

    // metodo para obtener todos los Usuarios
    public function getAllUsuarios() {

        $query = '';

        $output = array();

        $query .= " SELECT * FROM usuario ";
        if(isset($_POST["search"]["value"]))
        {
            $query .= 'where correo_name LIKE "%'.$_POST["search"]["value"].'%" ';
            $query .= 'OR user_name LIKE "%'.$_POST["search"]["value"].'%" ';
        }
        if(isset($_POST["order"]))
        {
            $query .= 'ORDER by '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else{
            $query .= 'ORDER BY id DESC ';
        }
        if($_POST["length"] != -1)
        {
            $query .= 'LIMIT ' .$_POST['start'] . ', ' . $_POST['length'];
        }


        //ejecutamos la consulta
        $consulta = $this->db->query($query);
        $respuesta = $consulta->fetch_all(MYSQLI_ASSOC);
        
        $data = array();
        //uso el metodo cout() para saber si existe al menos 1 elemento en el array
        $filtered_rows = count($respuesta);
        foreach($respuesta as $row)
        {
            $status = '';
            if($row['estatus'] == 'Activo')
            {
                $status = '<span class="label label-success">Activo</span>';
            }
            else
            {
                $status = '<span class="label label-danger">Inactivo</span>';
            }
            $sub_array = array();
            $sub_array[] = $row['id'];
            $sub_array[] = $row['correo_name'];
            $sub_array[] = $row['user_name'];
            $sub_array[] = $row['user_type'];
            $sub_array[] = $status;
            $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Actualizar</button>';
            $sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete" data-status="'.$row["estatus"].'">Cambiar Estatus</button>';
            $sub_array[] = '<button type="button" name="borrar" id="'.$row["id"].'" class="btn btn-danger btn-xs borrar">Eliminar Usuario</button>';
            $data[]      = $sub_array;
        }
        
        $tabla = 'usuario';
        $output = array(
            "draw"              => intval($_POST["draw"]),
            "recordsTotal"      => $filtered_rows,
            "recordsFiltered"   => self::get_total_comentarios($tabla),
            "data"              => $data
        );

        return json_encode($output);
        //cierro consulta para que no quede en memoria
        $respuesta->close();
        // cierro conexion a la bd
        $this->db->close();
        
        // if($respuesta) {
            
        //     return $respuesta;
        //     //cierro consulta para que no quede en memoria
        //     $respuesta->close();
        //     // cierro conexion a la bd
        //     $this->db->close();
        // }
    }

    // fin metodo para los usuarios


    // metodos para perfil
    public function EditPerfil()
    {
        if(isset($_POST['user_name']))
        {
            if($_POST["user_new_password"] != '')
            {
                $query = "
                UPDATE usuario SET 
                user_name = '".$_POST["user_name"]."', 
                correo_name = '".$_POST["user_email"]."', 
                user_password = '".password_hash($_POST["user_new_password"], PASSWORD_DEFAULT)."' 
                WHERE id = '".$_POST["user_id2"]."'
                ";
            }
            else
            {
                $query = "
                UPDATE usuario SET 
                user_name = '".$_POST["user_name"]."', 
                correo_name = '".$_POST["user_email"]."'
                WHERE id = '".$_POST["user_id2"]."'
                ";
            }
             //ejecutamos la consulta
             $consulta = $this->db->query($query);
            
            if(isset($consulta))
            {
                echo '<div class="alert alert-success">Perfil Editado</div>';
            }
        }
        else
        {
            echo '<div class="alert alert-success">Ingrese un Nombre de Usuario</div>';
        }
    }
    // fin metodos para perfil


    // metodos para tabla telefonos
    // metodo para mostrar en el front-end del index los telefonos activos
    public function getTelefonos(){
        //hacemos una consulta
        $tel = '';
        $ws = '';
        $email = '';
        $consulta=$this->db->query("SELECT * FROM telefonos ORDER BY id DESC");
        foreach($consulta as $row){
            if($row['estatus'] == 'Activo')
            {
                $tel = $row['tel'];
                $ws = $row['ws'];
                $email = $row['email'];
                echo '<i style="margin-left:5px;" class="fa fa-phone" aria-hidden="true"></i>'.$tel.' / <i style="margin-left:5px;" class="fab fa-whatsapp" aria-hidden="true"></i>'.$ws;
            }
            
        }
        //cierro consulta para que no quede en memoria
        $consulta->close();
        // cierro conexion a la bd
        $this->db->close();
    // return  "<li>".$comentario."</li>";    
    
    }

    //inicio Modal editar Telefonos
    public function ModalEditTelefonos() {
        $query = '';
        $query_editar = '';
        $output = array();
        //si viene vacio es porque agrega un nuevo usuario
        if($_POST['btn_action2'] == '')
        {
            $query_agregar = "
            INSERT INTO telefonos (tel, ws, nombre, email, comentario, estatus) 
            VALUES ('".$_POST["user_tel"]."', '".$_POST["user_ws"]."', '".$_POST["user_name2"]."' ,'".$_POST["user_email2"]."', 
                    '".$_POST["user_textarea2"]."', 'Inactivo' );
            "; 
            $consultaAgregar = $this->db->query($query_agregar);
            
            if(isset($consultaAgregar))
            {
            echo 'Nuevo Usuario Agregado';
            }
        }

        if($_POST['btn_action2'] == 'fetch_single')
        {
            
            $query = "SELECT * FROM telefonos WHERE id ='".$_POST['user_id2']."'";
            
            //ejecutamos la consulta
            $consulta = $this->db->query($query);
            $respuesta = $consulta->fetch_all(MYSQLI_ASSOC);
            
            //recorro en el foreach para mostrar los datos a editar en el form del modal y retorno como json
            foreach($respuesta as $row)
            {
                $output['user_tel'] = $row['tel'];
                $output['user_ws'] = $row['ws'];
                $output['user_email'] = $row['email'];
                $output['user_name'] = $row['nombre'];
                $output['user_textarea'] = $row['comentario'];
            }
            
            echo json_encode($output);   
            
        }
        
        if($_POST['btn_action2'] == 'Edit')
        {
            
            $query_editar = "UPDATE telefonos SET tel='".$_POST["user_tel"]."', ws='".$_POST["user_ws"]."', nombre = '".$_POST["user_name2"]."',
                    email = '".$_POST["user_email2"]."', comentario = '".$_POST["user_textarea2"]."'
                    WHERE id = '".$_POST["user_id2"]."' ";
            $consultaEditar = $this->db->query($query_editar);
            // $respuestaEditar = $consultaEditar->fetch_all(MYSQLI_ASSOC);
            if(isset($consultaEditar))
            {
                echo 'Usuario Editado';
            }
        }

        if($_POST['btn_action2'] == 'delete2'){
        
            $status = 'Activo';
            if($_POST['status'] == 'Activo'){
                
                $status = 'Inactivo';
            }
            
            $query_estatus = "
                update telefonos
                set estatus = '".$status."'
                where id = '".$_POST["user_id2"]."'
            ";
                
            $result = $this->db->query($query_estatus);
            if(isset($result)){
                
                echo 'Estatus Cambiado a ' . $status;
            }
        }
        // condicion para eliminar la fila seleccionada
        if($_POST['btn_action2'] == 'delete3'){
        
            $query_delete = "
                delete  from telefonos
                where id = '".$_POST["user_id2"]."'
            ";
                
            $result = $this->db->query($query_delete);
            if(isset($result)){
                
                echo 'Datos Eliminados ';
            }
        }

    }
    //fin Modal editar Telefonos

    // metodo para obtener todos los telefonos y su demas campos
    public function getAllTelefonos() {

        $query = '';

        $output = array();

        $query .= " SELECT * FROM telefonos ";
        if(isset($_POST["search"]["value"]))
        {
            $query .= 'where tel LIKE "%'.$_POST["search"]["value"].'%" ';
            $query .= 'OR email LIKE "%'.$_POST["search"]["value"].'%" ';
            $query .= 'OR nombre LIKE "%'.$_POST["search"]["value"].'%" ';
        }
        if(isset($_POST["order"]))
        {
            $query .= 'ORDER by '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else{
            $query .= 'ORDER BY id DESC ';
        }
        if($_POST["length"] != -1)
        {
            $query .= 'LIMIT ' .$_POST['start'] . ', ' . $_POST['length'];
        }


        //ejecutamos la consulta
        $consulta = $this->db->query($query);
        $respuesta = $consulta->fetch_all(MYSQLI_ASSOC);
        
        $data = array();
        //uso el metodo cout() para saber si existe al menos 1 elemento en el array
        $filtered_rows = count($respuesta);
        foreach($respuesta as $row)
        {
            $status = '';
            if($row['estatus'] == 'Activo')
            {
                $status = '<span class="label label-success">Activo</span>';
            }
            else
            {
                $status = '<span class="label label-danger">Inactivo</span>';
            }
            $sub_array = array();
            $sub_array[] = $row['id'];
            $sub_array[] = $row['tel'];
            $sub_array[] = $row['ws'];
            $sub_array[] = $row['nombre'];
            $sub_array[] = $row['email'];
            $sub_array[] = $row['comentario'];
            $sub_array[] = $status;
            $sub_array[] = '<button type="button" name="update2" id="'.$row["id"].'" class="btn btn-warning btn-xs update2">Actualizar</button>';
            $sub_array[] = '<button type="button" name="delete2" id="'.$row["id"].'" class="btn btn-danger btn-xs delete2" data-status="'.$row["estatus"].'">Cambiar Estatus</button>';
            $sub_array[] = '<button type="button" name="delete3" id="'.$row["id"].'" class="btn btn-danger btn-xs delete3">Eliminar Datos</button>';
            $data[]      = $sub_array;
        }
        $tabla = 'telefonos';
        $output = array(
            "draw"              => intval($_POST["draw"]),
            "recordsTotal"      => $filtered_rows,
            "recordsFiltered"   => self::get_total_comentarios($tabla),
            "data"              => $data
        );

        return json_encode($output);
        //cierro consulta para que no quede en memoria
        $respuesta->close();
        // cierro conexion a la bd
        $this->db->close();
    }

    // fin metodos para tabla telefonos



    // metodo para insertar contactos desde el formulario contacto
    public function insertContacto() {
        $email = '';
        $name = '';
        $message = '';
        $mensaje = '';

        $email = $_POST["con_email2"];
        $name = $_POST["con_name2"];
        $mensaje = $_POST["con_mensaje2"];
        $email_clear = self::clean_text($email);
        $name_clear = self::clean_text($name);
        $mensaje_clear = self::clean_text($mensaje);

        if(isset($email_clear) && $email_clear != '' && self::check_email($email_clear))
        {
            if(isset($name_clear) && $name_clear != '')
            {
                if(isset($mensaje_clear) && $mensaje_clear != '')
                {
                    $ip = $_SERVER["REMOTE_ADDR"];
                    $query = '';
                    $query = "
                    INSERT INTO contacto (nombre, email, comentarios, ip)
                    VALUES ('".$name_clear."', '".$email_clear."', 
                            '".$mensaje_clear."', '".$ip."' );
                    "; 
                     $consultaAgregar = $this->db->query($query);
                    
                    if(isset($consultaAgregar) && $consultaAgregar != '')
                    {
                         $message_bd = 'Nuevo Usuario Agregado en la Base de Datos';
                    }
                    else
                    {
                         $message_bd = 'El Usuario no se pudo Agregar a la Base de Datos';
                    }

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
                                <td style="padding-left:10px;" width="30%">Email</td>
                                <td style="padding-left:10px;" width="70%">'.$email_clear.'</td>
                            </tr>
                            <tr>
                                <td style="padding-left:10px;" width="30%">Comentario</td>
                                <td style="padding-left:10px;" width="70%">'.$mensaje_clear.'</td>
                            </tr>
                            <tr>
                                <td style="padding-left:10px;" width="30%">Ip</td>
                                <td style="padding-left:10px;" width="70%">'.$ip.'</td>
                            </tr>
                            <tr>
                                <td style="padding-left:10px;" width="30%">Mensaje Base de Datos</td>
                                <td style="padding-left:10px;" width="70%">'.$message_bd.'</td>
                            </tr>
                        </table>
                    ';

                    $message_muestra = '
                        <h3 align="center">Información del Contacto</h3>
                        <table border="1" width="100%" cellpadding="5" cellspacing="5">
                            <tr>
                                <td style="padding-left:10px;" width="30%">Nombre</td>
                                <td style="padding-left:10px;" width="70%">'.$name_clear.'</td>
                            </tr>
                            <tr>
                                <td style="padding-left:10px;" width="30%">Email</td>
                                <td style="padding-left:10px;" width="70%">'.$email_clear.'</td>
                            </tr>
                            <tr>
                                <td style="padding-left:10px;" width="30%">Comentario</td>
                                <td style="padding-left:10px;" width="70%">'.$mensaje_clear.'</td>
                            </tr>
                        </table>
                    ';

                    require ("../class/phpmailer/class.phpmailer.php");
                    require ("../class/phpmailer/class.smtp.php");
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
                    $mail->setFrom('no-reply@amarokdatacenter.cl', 'Contacto');
                    $mail->From = $email_clear;					//Sets the From email address for the message
                    $mail->FromName = $name_clear;				//Sets the From name of the message
                    $mail->AddAddress('pruebaamarok@gmail.com', 'amarokdatacenter.cl');		//Adds a "To" address
                    //Para enviar un correo formateado en HTML lo cargamos con la siguiente función. Si no, puedes meterle directamente una cadena de texto.
                    $mail->MsgHTML($message);
                    //Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) una versión alternativa en texto plano (también será válida para lectores de pantalla)
                    $mail->AltBody = $message;
                    $mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
                    $mail->IsHTML(true);							//Sets message type to HTML
            //    	$mail->AddAttachment($path);					//Adds an attachment from a path on the filesystem
                    $mail->Subject = 'Nuevo Contacto';			//Sets the Subject of the message
                    $mail->Body = $message;							//An HTML or plain text message body
                    if($mail->Send())								//Send an Email. Return true on success or false on error
                    {
                        
                        echo $message = '<div class="alert alert-success text-center">Email enviado Exitosamente.</div><hr><div class="alert alert-info">'.$message_muestra.'</div>';
                        // echo $json;
                        
            //            unlink($path);
                    }
                    else
                    {
                        echo $message = '<div class="alert alert-danger text-center">Error al intentar enviar el email</div>';
                    }
                }
                else
                {
                    echo $message = '<div class="alert alert-danger text-center">Escriba un Mensaje </div>';
                }
            }
            else
            {
                echo $message = '<div class="alert alert-danger text-center">Escriba un Nombre </div>';
            }
        }
        else
        {
            echo $message = '<div class="alert alert-danger text-center">Escriba un Email Valido</div>';
        }

    }

    // fin metodo para insertar contactos desde el formulario contacto

    public function insertComentario() {
        $message = '';
        $name = '';
        $tel = '';
        $email = '';
        $mensaje = '';

        $email = $_POST["con_email"];
        $name = $_POST["con_name"];
        $tel = $_POST["con_tel"];
        $mensaje = $_POST["con_mensaje"];
        $email_clear = self::clean_text($email);
        $name_clear = self::clean_text($name);
        $mensaje_clear = self::clean_text($mensaje);

        if(isset($email_clear) && $email_clear != '' && self::check_email($email_clear))
        {
            if(isset($name_clear) && $name_clear != '')
            {
                if(isset($mensaje_clear) && $mensaje_clear != '')
                {
                    $ip = $_SERVER["REMOTE_ADDR"];
                    $status = 'Inactivo';
                    $query = '';
                    $query = "
                    INSERT INTO comentario (nombre, telefono, email, comentarios, estatus, ip)
                    VALUES ('".$name_clear."', '".$tel."', '".$email_clear."', 
                            '".$mensaje_clear."', '".$status."', '".$ip."' );
                    "; 
                    $consultaAgregar = $this->db->query($query);
                    
                    if(isset($consultaAgregar) && $consultaAgregar != '')
                    {
                         $message_bd = 'Nuevo Usuario Agregado en la Base de Datos';
                    }
                    else
                    {
                         $message_bd = 'El Usuario no se pudo Agregar a la Base de Datos';
                    }

                    //    $path = 'upload/' . $_FILES["resume"]["name"];
                    //    move_uploaded_file($_FILES["resume"]["tmp_name"], $path);           
                    $message = '
                        <h3 align="center">Información del Cliente</h3>
                        <table border="1" width="100%" cellpadding="5" cellspacing="5">
                            <tr>
                                <td style="padding-left:10px;" width="30%">Nombre</td>
                                <td style="padding-left:10px;" width="70%">'.$name_clear.'</td>
                            </tr>
                            <tr>
                                <td style="padding-left:10px;" width="30%">Telefono</td>
                                <td style="padding-left:10px;" width="70%">'.$tel.'</td>
                            </tr>
                            <tr>
                                <td style="padding-left:10px;" width="30%">Email</td>
                                <td style="padding-left:10px;" width="70%">'.$email_clear.'</td>
                            </tr>
                            <tr>
                                <td style="padding-left:10px;" width="30%">Comentario</td>
                                <td style="padding-left:10px;" width="70%">'.$mensaje_clear.'</td>
                            </tr>
                            <tr>
                                <td style="padding-left:10px;" width="30%">Estatus</td>
                                <td style="padding-left:10px;" width="70%">'.$status.'</td>
                            </tr>
                            <tr>
                                <td style="padding-left:10px;" width="30%">Ip</td>
                                <td style="padding-left:10px;" width="70%">'.$ip.'</td>
                            </tr>
                            <tr>
                                <td style="padding-left:10px;" width="30%">Mensaje Base de Datos</td>
                                <td style="padding-left:10px;" width="70%">'.$message_bd.'</td>
                            </tr>
                        </table>
                    ';

                    $message_muestra = '
                        <h3 align="center">Información del Cliente</h3>
                        <table border="1" width="100%" cellpadding="5" cellspacing="5">
                            <tr>
                                <td style="padding-left:10px;" width="30%">Nombre</td>
                                <td style="padding-left:10px;" width="70%">'.$name_clear.'</td>
                            </tr>
                            <tr>
                                <td style="padding-left:10px;" width="30%">Telefono</td>
                                <td style="padding-left:10px;" width="70%">'.$tel.'</td>
                            </tr>
                            <tr>
                                <td style="padding-left:10px;" width="30%">Email</td>
                                <td style="padding-left:10px;" width="70%">'.$email_clear.'</td>
                            </tr>
                            <tr>
                                <td style="padding-left:10px;" width="30%">Comentario</td>
                                <td style="padding-left:10px;" width="70%">'.$mensaje_clear.'</td>
                            </tr>
                        </table>
                    ';

                    require ("../class/phpmailer/class.phpmailer.php");
                    require ("../class/phpmailer/class.smtp.php");
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
                    $mail->setFrom('no-reply@amarokdatacenter.cl', 'Comentario');
                    $mail->From = $email_clear;					//Sets the From email address for the message
                    $mail->FromName = $name_clear;				//Sets the From name of the message
                    $mail->AddAddress('pruebaamarok@gmail.com', 'amarokdatacenter.cl');		//Adds a "To" address
                    //Para enviar un correo formateado en HTML lo cargamos con la siguiente función. Si no, puedes meterle directamente una cadena de texto.
                    $mail->MsgHTML($message);
                    //Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) una versión alternativa en texto plano (también será válida para lectores de pantalla)
                    $mail->AltBody = $message;
                    $mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
                    $mail->IsHTML(true);							//Sets message type to HTML
            //    	$mail->AddAttachment($path);					//Adds an attachment from a path on the filesystem
                    $mail->Subject = 'Nuevo comentario';			//Sets the Subject of the message
                    $mail->Body = $message;							//An HTML or plain text message body
                    if($mail->Send())								//Send an Email. Return true on success or false on error
                    {
                        
                        echo $message = '<div class="alert alert-success text-center">Email enviado Exitosamente.</div><hr><div class="alert alert-info">'.$message_muestra.'</div>';
                        // echo $json;
                        
            //            unlink($path);
                    }
                    else
                    {
                        echo $message = '<div class="alert alert-danger text-center">Error al intentar enviar el email</div>';
                    }
                }
                else
                {
                    echo $message = '<div class="alert alert-danger text-center">Escriba un Mensaje </div>';
                }
            }
            else
            {
                echo $message = '<div class="alert alert-danger text-center">Escriba un Nombre </div>';
            }
        }
        else
        {
            echo $message = '<div class="alert alert-danger text-center">Escriba un Email Valido</div>';
        }

    }

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

    //inicio Modal editar comentarios
    public function ModalEditComentarios() {
        $query = '';
        $query_editar = '';
        $output = array();
        //si viene vacio es porque agrega un nuevo usuario
        if($_POST['btn_action'] == '')
        {
            
            $query_agregar = "
            INSERT INTO comentario (nombre, email, comentarios, estatus) 
            VALUES ('".$_POST["user_name"]."' ,'".$_POST["user_email"]."', 
                    '".$_POST["user_textarea"]."', 'Inactivo' );
            "; 
            $consultaAgregar = $this->db->query($query_agregar);
            
            if(isset($consultaAgregar))
            {
            echo 'Nuevo Usuario Agregado';
            }
        }

        if($_POST['btn_action'] == 'fetch_single')
        {
            
            $query = "SELECT * FROM comentario WHERE id ='".$_POST['user_id']."'";
            
            //ejecutamos la consulta
            $consulta = $this->db->query($query);
            $respuesta = $consulta->fetch_all(MYSQLI_ASSOC);
            
            foreach($respuesta as $row)
            {
                $output['user_email'] = $row['email'];
                $output['user_name'] = $row['nombre'];
                $output['user_textarea'] = $row['comentarios'];
            }
            
            echo json_encode($output);   
            
        }
        
        if($_POST['btn_action'] == 'Edit')
        {
            
            $query_editar = "UPDATE comentario SET nombre = '".$_POST["user_name"]."',
                    email = '".$_POST["user_email"]."', comentarios = '".$_POST["user_textarea"]."'
                    WHERE id = '".$_POST["user_id"]."' ";
            $consultaEditar = $this->db->query($query_editar);
            // $respuestaEditar = $consultaEditar->fetch_all(MYSQLI_ASSOC);
            if(isset($consultaEditar))
            {
                echo 'Usuario Editado';
            }
        }

        if($_POST['btn_action'] == 'delete'){
        
            $status = 'Activo';
            if($_POST['status'] == 'Activo'){
                
                $status = 'Inactivo';
            }
            $query_estatus = "
                update comentario
                set estatus = '".$status."'
                where id = '".$_POST["user_id"]."'
            ";
                
            $result = $this->db->query($query_estatus);
            if(isset($result)){
                
                echo 'Estatus Cambiado a ' . $status;
            }
        }

        // condicion para eliminar la fila seleccionada
        if($_POST['btn_action'] == 'borrar'){
        
            $query_delete = "
                delete  from comentario
                where id = '".$_POST["user_id"]."'
            ";
                
            $result = $this->db->query($query_delete);
            if(isset($result)){
                
                echo 'Datos Eliminados ';
            }
        }

    }
    //fin Modal editar comentarios


    // metodo para obtener todos los comentarios
    public function getAllComentarios() {

        $query = '';

        $output = array();

        $query .= " SELECT * FROM comentario ";
        if(isset($_POST["search"]["value"]))
        {
            $query .= 'where email LIKE "%'.$_POST["search"]["value"].'%" ';
            $query .= 'OR nombre LIKE "%'.$_POST["search"]["value"].'%" ';
        }
        if(isset($_POST["order"]))
        {
            $query .= 'ORDER by '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else{
            $query .= 'ORDER BY id DESC ';
        }
        if($_POST["length"] != -1)
        {
            $query .= 'LIMIT ' .$_POST['start'] . ', ' . $_POST['length'];
        }


        //ejecutamos la consulta
        $consulta = $this->db->query($query);
        $respuesta = $consulta->fetch_all(MYSQLI_ASSOC);
        
        $data = array();
        //uso el metodo cout() para saber si existe al menos 1 elemento en el array
        $filtered_rows = count($respuesta);
        foreach($respuesta as $row)
        {
            $status = '';
            if($row['estatus'] == 'Activo')
            {
                $status = '<span class="label label-success">Activo</span>';
            }
            else
            {
                $status = '<span class="label label-danger">Inactivo</span>';
            }
            $sub_array = array();
            $sub_array[] = $row['id'];
            $sub_array[] = $row['email'];
            $sub_array[] = $row['nombre'];
            $sub_array[] = $row['comentarios'];
            $sub_array[] = $status;
            $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Actualizar</button>';
            $sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete" data-status="'.$row["estatus"].'">Cambiar Estatus</button>';
            $sub_array[] = '<button type="button" name="borrar" id="'.$row["id"].'" class="btn btn-danger btn-xs borrar">Eliminar Comentario</button>';
            $data[]      = $sub_array;
        }
        
        $tabla = 'comentario';
        $output = array(
            "draw"              => intval($_POST["draw"]),
            "recordsTotal"      => $filtered_rows,
            "recordsFiltered"   => self::get_total_comentarios($tabla),
            "data"              => $data
        );

        return json_encode($output);
        //cierro consulta para que no quede en memoria
        $respuesta->close();
        // cierro conexion a la bd
        $this->db->close();
        
        // if($respuesta) {
            
        //     return $respuesta;
        //     //cierro consulta para que no quede en memoria
        //     $respuesta->close();
        //     // cierro conexion a la bd
        //     $this->db->close();
        // }
    }

    public function get_total_comentarios($tabla)
        {
            $comentarios = '';
            $comentarios = " SELECT * FROM $tabla";
            //ejecutamos la consulta
            $consulta = $this->db->query($comentarios);
            $respuesta = $consulta->fetch_all(MYSQLI_ASSOC);
            
            //uso el metodo cout() para saber si existe al menos 1 elemento en el array
            $totalRows = count($respuesta);
            return $totalRows;

            //cierro consulta para que no quede en memoria
            $respuesta->close();
            // cierro conexion a la bd
            $this->db->close();
        }

    public function getComentario(){
        //hacemos una consulta
        $nombre = '';
        $comentario = '';
        $consulta=$this->db->query("SELECT * FROM comentario ORDER BY id DESC");
        foreach($consulta as $row){
            if($row['estatus'] == 'Activo')
            {
                $nombre = $row['nombre'];
                $comentario = $row['comentarios'];
                echo '<li class"col-md-12 comentarios-lista"><strong>Nombre: </strong>'.$nombre.'<br>'.$comentario.'<br><i class="far fa-smile icon-comentarios"></i></li><br>';    
            }
            
        }
        //cierro consulta para que no quede en memoria
        $consulta->close();
        // cierro conexion a la bd
        $this->db->close();
    // return  "<li>".$comentario."</li>";    
    
    }
    // metodo para login al sistema
    public function getUser($userName) {
        $sql = "SELECT * FROM usuario WHERE correo_name='".$userName."'";
        $busca = $this->db->query($sql);
        // Obtener todas las filas en un array asociativo
        $respuesta = $busca->fetch_all(MYSQLI_ASSOC);
        if($respuesta) {
            
            return $respuesta;
            //cierro consulta para que no quede en memoria
            $respuesta->close();
            // cierro conexion a la bd
            $this->db->close();
        }
    }

    // public function modificarComentario($id, $correo_name){
    //     $sql = "UPDATE usuario SET correo_name='".$correo_name."' WHERE id='".$id."'";
    //     $modifica = $this->db->query($sql);

    //     if(!$modifica){
    //         echo "Fallo la modificación de datos";
    //     } else {
    //         return $modifica;
    //         $modifica->close();
    //         $this->db->close();
    //     }
    // }
}
?>