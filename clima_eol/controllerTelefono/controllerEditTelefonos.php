<?php

require_once ("../class/db/db.php");

$tel = new aire();

$json_edittelefonos = $tel->ModalEditTelefonos();

echo $json_edittelefonos;

?>