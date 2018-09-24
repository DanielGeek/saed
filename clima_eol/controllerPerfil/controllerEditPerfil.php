<?php

require_once ("../class/db/db.php");

$Perfil = new aire();

$respuesta = $Perfil->EditPerfil();

echo $respuesta;

?>