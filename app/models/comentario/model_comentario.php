<?php

    Class Comentario extends Conexion {

        function __construct($host,$usu,$pass,$db){
            parent:: __construct($host,$usu,$pass,$db);
        }

        public function subirComentario($descripcion,$correoUser,$id_audio){
            $sql = "INSERT INTO comentarios (correo,descripcion,id_audio) VALUES(?,?,?)";
            $resultado = $this->conexion->prepare($sql);
            $resultado->bind_param("ssi",$correoUser,$descripcion,$id_audio);
            $resultado->execute();

            $filasAfectadas = $resultado->affected_rows;

            return $filasAfectadas;
        }

    
        public function borrarComentario($id){
            $sql = "DELETE FROM comentarios WHERE id_comentario = ?";
            $resultado = $this->conexion->prepare($sql);
            $resultado->bind_param("i",$id);
            $resultado->execute();
            if($resultado->affected_rows == 1){
                    $mensaje = "Exito";
            }else{
                $mensaje = "Fallo"; 
            }
            return $mensaje;
        }

        
        
    }
?>

