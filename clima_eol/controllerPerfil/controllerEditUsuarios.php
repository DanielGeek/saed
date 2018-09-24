<?php

require_once ("../class/db/db.php");

$usuarios = new aire();

$respuesta = $usuarios->ModalEditUsuarios();

echo $respuesta;

?>