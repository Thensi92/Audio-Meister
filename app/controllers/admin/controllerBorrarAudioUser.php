<?php
    require_once("app/db/config.php");
    include "app/models/conexion/model_conexion_BBDD.php";
    include "app/models/model_audio.php";

    $idAudio = base64_decode($_GET["id"]);
    $idCasteado = (int)$idAudio;
    $correoUser= base64_decode($_GET["correo"]);
    $ruta = base64_decode($_GET["ruta"]);

  
    $metConexion = Config::$metodoConexion;
    $user= Config::$usuario;
    $contra = Config::$contraseña;
    $nombreBD = Config::$nombreBaseDatos;

    $conexion = new Audio($metConexion,$user,$contra,$nombreBD);

    $mensaje = $conexion->borrarAudio($idCasteado,$correoUser,$ruta);
    header("Location:index.php?ctl=listarAllAudios");
?>