<?php

require_once ("../class/db/db.php");

$contacto = new aire();

$respuesta = $contacto->insertContacto();

echo $respuesta;

?>