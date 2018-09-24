<?php
include_once ("../models/phpmailer/class.phpmailer.php");
include_once ("../models/phpmailer/class.smtp.php");
include_once ('../models/modelContacto.php');

$contacto = new contacto();

$respuesta = $contacto->insertContacto();
echo $respuesta;

?>