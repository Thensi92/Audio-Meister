<?php
    require_once("app/db/config.php");
    include "app/models/conexion/model_conexion_BBDD.php";
    include "app/models/model_audio.php";
    include "app/models/usuario/Usuario.php";

    $idAudioDetalle = $_GET["id"];
    $metConexion = Config::$metodoConexion;
    $user= Config::$usuario;
    $contra = Config::$contraseña;
    $nombreBD = Config::$nombreBaseDatos;

    $conexion = new Audio($metConexion,$user,$contra,$nombreBD);
    $arrayDatos = $conexion->buscarAudio($idAudioDetalle);
    $conexion->cerrarConexion();

    $conexionApodo = new Usuario($metConexion,$user,$contra,$nombreBD);
    $correoEjem = $arrayDatos["correoUsuario"];
    $apodo = $conexionApodo->getApodo($correoEjem);

    //Vista de detalle con el reproductor
    include "app/views/audio/viewDetalleAudio.php";
?>