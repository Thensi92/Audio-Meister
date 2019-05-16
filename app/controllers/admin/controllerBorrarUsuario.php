<?php
    include "config.php";
    include "model_conexion_BBDD.php";
    include "model_audio.php";

    $metConexion = Config::$metodoConexion;
    $user= Config::$usuario;
    $contra = Config::$contraseña;
    $nombreBD = Config::$nombreBaseDatos;

    $correo = base64_decode($_GET["correo"]);

    $conexion = new Audio($metConexion,$user,$contra,$nombreBD);

    $resultado = $conexion->borrarUsuario($correo);
    header("Location:index.php?ctl=listarAllUser");
?>
