<?php
     include "app/db/config.php";
     include "app/models/conexion/model_conexion_BBDD.php";
     include "app/models/model_audio.php";

    $metConexion = Config::$metodoConexion;
    $user= Config::$usuario;
    $contra = Config::$contraseña;
    $nombreBD = Config::$nombreBaseDatos;

    $conexion = new PDO("mysql:host=$metConexion;dbname=$nombreBD;", $user, $contra);
    $pagination = new PDO_Pagination($conexion);

    $pagination->rowCount("SELECT * FROM audios");
    $pagination->config(1, 99);
    
    $sql = "SELECT * FROM audios ORDER BY id_audio ASC LIMIT $pagination->start_row, $pagination->max_rows";
    $query = $conexion->prepare($sql);
    $query->execute();
    $model = array();
    while($rows = $query->fetch())
    {
        $model[] = $rows;
    }

    include "app/views/admin/viewListaAudios.php";
?>