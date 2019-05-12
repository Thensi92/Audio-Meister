<?php
    include "app/db/config.php";
    include "app/models/conexion/model_conexion_BBDD.php";
    include "app/models/model_audio.php";
    $idAudioDetalle = $_GET["id"];

    $metConexion = Config::$metodoConexion;
    $user= Config::$usuario;
    $contra = Config::$contraseña;
    $nombreBD = Config::$nombreBaseDatos;
    $conexion = new Audio($metConexion,$user,$contra,$nombreBD);
    $arrayDatos = $conexion->buscarAudio($idAudioDetalle);
    $conexion->cerrarConexion();

    
    $_SESSION["audioBorrar"]["idAudio"] = $arrayDatos["id"];
    $_SESSION["audioBorrar"]["propietarioAudio"] = $arrayDatos["correoUsuario"] ;
    $_SESSION["audioBorrar"]["ruta"] = $arrayDatos["rutaAudio"] ;

    include "apps/views/audio/viewFrmEditar.php";
   
?>