<?php

require_once ("../class/db/db.php");

$usuarios = new aire();

$respuesta = $usuarios->getAllUsuarios();

echo $respuesta;

?>