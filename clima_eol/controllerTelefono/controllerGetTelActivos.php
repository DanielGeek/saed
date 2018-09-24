<?php

require_once ("../class/db/db.php");

$telefonos_activos = new aire();

$respuesta = $telefonos_activos->getTelefonos();

echo $respuesta;

?>