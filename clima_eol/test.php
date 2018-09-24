<?php
/*para que el programa funcione requerimos obligatoriamente 
y de forma estricta que se incluya el fichero class.php*/
require_once("class/db/db.php"); 
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>MySQLi PHP</title>
</head>
<body>
<?php
    $productos=new Productos(); //instanciamos el objeto Productos
 
        /*llamamos al método get_productos() dentro de una variable 
        que ahora sera el array asociativo devuelto por este método*/
    $producto=$productos->get_productos();
 
        /*Comprobamos si $i es menor que la longitud del array $producto entonces ve sumando uno a $i*/
    for($i=0;$i<sizeof($producto);$i++){
        echo $producto[$i]["comentario"]."<br/>";
    }
        /*En cada iteración pasa por la primera dimensión y coloca $i y 
        en la segunda dimensión consigue el la fila de la columna DESCRIPCION 
        de la base de datos. */
?>