<?php

require_once ("../class/db/db.php");

$comentarios = new aire();

$json_comentarios = $comentarios->getAllComentarios();

echo $json_comentarios;

?>