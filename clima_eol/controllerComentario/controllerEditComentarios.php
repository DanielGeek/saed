<?php

require_once ("../class/db/db.php");

$comentarios = new aire();

$json_editcomentarios = $comentarios->ModalEditComentarios();

echo $json_editcomentarios;

?>