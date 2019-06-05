<?php
     //include "app/db/config.php";
     //include "app/models/conexion/model_conexion_BBDD.php";
     include "app/models/comentario/model_comentario.php";

     $metConexion = Config::$metodoConexion;
     $user= Config::$usuario;
     $contra = Config::$contraseña;
     $nombreBD = Config::$nombreBaseDatos;

     $conexion = new PDO("mysql:host=$metConexion;dbname=$nombreBD;", $user, $contra);
     $pagination = new PDO_Pagination($conexion);
     $id = $_GET["id"];

     $pagination->rowCount("SELECT * FROM Comentarios WHERE id_audio = $id ");
     $pagination->config(3, 99);
     
     $sql = "SELECT * FROM comentarios WHERE id_audio = $id LIMIT $pagination->start_row, $pagination->max_rows";
     $query = $conexion->prepare($sql);
     $query->execute();
     $model = array();
     while($rows = $query->fetch())
     {
         $model[] = $rows;
     }
     
     include "app/views/comentario/viewListaComentarios.php";

?>