<?php

require_once ("../class/db/db.php");

$telefonos = new aire();

$json_telefonos = $telefonos->getAllTelefonos();

echo $json_telefonos;

?>