<?php
    include "app/db/config.php";
    include "app/models/model_conexion_BBDD.php";
    include "app/models/model_audio.php";

    $idAudioDetalle = $_GET["id"];

    $metConexion = Config::$metodoConexion;
    $user= Config::$usuario;
    $contra = Config::$contraseña;
    $nombreBD = Config::$nombreBaseDatos;

    $conexion = new Audio($metConexion,$user,$contra,$nombreBD);
    $arrayDatos = $conexion->buscarAudio($idAudioDetalle);
    $conexion->cerrarConexion();
    //Vista de detalle con el reproductor
    include "app/views/viewDetalleAudio.php";
?>