<?php
    include "app/db/config.php";
    include "app/models/conexion/model_conexion_BBDD.php";
    include "app/models/model_audio.php";

    $idAudio = $_SESSION["audioBorrar"]["idAudio"];
    $correoUser= $_SESSION["audioBorrar"]["propietarioAudio"];
    $ruta = $_SESSION["audioBorrar"]["ruta"];
    
    $metConexion = Config::$metodoConexion;
    $user= Config::$usuario;
    $contra = Config::$contraseña;
    $nombreBD = Config::$nombreBaseDatos;

    $conexion = new Audio($metConexion,$user,$contra,$nombreBD);

    $mensaje = $conexion->borrarAudio($idAudio,$correoUser,$ruta);
    echo $mensaje;
    unset($_SESSION["audioBorrar"]);
    header("Location:index.php?ctl=verOwnAudios");
?>