<?php
    include "app/db/config.php";
    include "app/models/conexion/model_conexion_BBDD.php";
    include "app/models/model_audio.php";

   
    $metConexion = Config::$metodoConexion;
    $user= Config::$usuario;
    $contra = Config::$contraseña;
    $nombreBD = Config::$nombreBaseDatos;

    $conexion = new Audio($metConexion,$user,$contra,$nombreBD);

    $correoUser = $_SESSION["datosUser"]["correo"];
    $tipoUsuario = $_SESSION["datosUser"]["modalidad"];

    $resCount = $conexion->getOwnAudios($correoUser);
    if($tipoUsuario == "Free" && $resCount >=3 ){
        $conexion->cerrarConexion();
        header("Location:index.php?ctl=verMsgError&ctlSecundario=verOwnAudios&ctlError=limite");
    }
    $conexion->cerrarConexion();
?>