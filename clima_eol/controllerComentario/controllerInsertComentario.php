<?php

require_once ("../class/db/db.php");

$comentarios = new aire();

$respuesta = $comentarios->insertComentario();

echo $respuesta;

?>