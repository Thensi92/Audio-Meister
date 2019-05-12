<?php
    include "app/db/config.php";
    include "app/models/model_conexion_BBDD.php";
    include "app/models/model_audio.php";
    include "app/lib/getid3/getid3.php";

    $metConexion = Config::$metodoConexion;
    $user= Config::$usuario;
    $contra = Config::$contraseña;
    $nombreBD = Config::$nombreBaseDatos;

    $conexion = new Audio($metConexion,$user,$contra,$nombreBD);

    $nombre=$_POST["nombreAudio"];
    $formatoArchivo = $_FILES["archivoAudio"]["type"];
    $tamañoArchivo = $_FILES["archivoAudio"]["size"];
    $rutaTemporal = $_FILES["archivoAudio"]["tmp_name"];
    $correoUser = $_SESSION["datosUser"]["correo"];
    $tipoArchivo = $_POST["tipoAudio"];
    $nArchivo= $_FILES['archivoAudio']['name'];

    $resultado = $conexion->subirArchivoAudio($nombre,$nArchivo,$rutaTemporal,$formatoArchivo,$tamañoArchivo,$correoUser,$tipoArchivo);
    $conexion->cerrarConexion();
    echo "$resultado";
?>