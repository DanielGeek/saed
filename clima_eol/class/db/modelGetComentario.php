<?php


class modelGetComentario {
private $db;

    public function __construct() {
        $this->db = Conectar::conexion();
    }

    public function getComentario(){
        //hacemos una consulta
        $nombre = '';
        $comentario = '';
        $consulta=$this->db->query("SELECT * FROM comentario ORDER BY id DESC");
        foreach($consulta as $row){
            if($row['estatus'] == 'Activo')
            {
                $nombre = $row['nombre'];
                $comentario = $row['comentarios'];
                echo '<li class"col-md-12 comentarios-lista"><strong>Nombre: </strong>'.$nombre.'<br>'.$comentario.'<br><i class="far fa-smile icon-comentarios"></i></li><br>';    
            }
            
        }
        //cierro consulta para que no quede en memoria
        $consulta->close();
        // cierro conexion a la bd
        $this->db->close();
    
    }
}
?>