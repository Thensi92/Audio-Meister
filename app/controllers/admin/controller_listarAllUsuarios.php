<?php
    require_once("app/db/config.php");
    include "app/models/conexion/model_conexion_BBDD.php";
    include "app/models/model_audio.php";

    $metConexion = Config::$metodoConexion;
    $user= Config::$usuario;
    $contra = Config::$contraseña;
    $nombreBD = Config::$nombreBaseDatos;

    $conexion = new PDO("mysql:host=$metConexion;dbname=$nombreBD;", $user, $contra);
    $pagination = new PDO_Pagination($conexion);

    $pagination->rowCount("SELECT * FROM usuarios");
    $pagination->config(3, 99);
    
    $sql = "SELECT * FROM usuarios WHERE rol ='user' LIMIT $pagination->start_row, $pagination->max_rows";
    $query = $conexion->prepare($sql);
    $query->execute();
    $model = array();
    while($rows = $query->fetch())
    {
        $model[] = $rows;
    }

    include "app/views/admin/viewListaUsuarios.php";
?>