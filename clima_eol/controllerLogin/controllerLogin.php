<?php


include('../class/db/db.php');


$login = new aire();

$data = array();
$message = '';
$data['message'] = 'redireccionando';
// echo $_SESSION['type'];

//si existe una session abierta redirijo al index
if(isset($_SESSION['type']))
{
  $data['success'] = 'ok';
  echo json_encode($data);
  return;
//   header('location:index.php');
}

if(isset($_POST["login"]))
{   
            
            if($_POST['userName'] == '' || $_POST['Password1'] == '')
            return;
             //retorno la data como array asociativo con el metodo getUser
            $usuario = $login->getUser($_POST['userName']);
              //uso el metodo cout() para saber si existe al menos 1 elemento en el array
            $count = count($usuario);

            if($count > 0)
            {
            //si existe al menos 1, recorro el array asociativo con foreach
            foreach($usuario as $row)
            {
            if(password_verify($_POST["Password1"], $row["user_password"]))
            {
                if($row['estatus'] == 'Activo')
                {
                $_SESSION['type'] = $row['user_type'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['user_name'] = $row['user_name'];
                $data['success'] = 'ok';
                
                echo json_encode($data);
                return;
                // header("location:index.php");
                }
                else
                {

                     $message = "Cuenta desativada, contacta con el administrador!";
                    $data['message'] = $message;
                    $data['success'] = 'error';
                    echo json_encode($data);
                    return;
                }
            }
            else
            {
                $message = 'Usuario o Contraseña Invalidos';
                $data['message'] = $message;
                $data['success'] = 'error';
                echo json_encode($data);
                return;
            }
        }
    }
    else
    {
        $message = 'No se encontro el usuario';
        $data['message'] = $message;
        $data['success'] = 'error';
        echo json_encode($data);
        return;
    }
}
else
{
    $message = "No se encontro el post login";
    $data['message'] = $message;
    $data['success'] = 'error';
    echo json_encode($data);
    return;
}

?>