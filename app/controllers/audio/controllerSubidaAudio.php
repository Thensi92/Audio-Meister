<?php
    include "app/db/config.php";
    include "app/models/conexion/model_conexion_BBDD.php";
    include "app/models/model_audio.php";
    include "app/lib/getid3/getid3.php";

    $metConexion = Config::$metodoConexion;
    $user= Config::$usuario;
    $contra = Config::$contraseña;
    $nombreBD = Config::$nombreBaseDatos;

    $conexion = new Audio($metConexion,$user,$contra,$nombreBD);
    $conexionCount = new Audio($metConexion,$user,$contra,$nombreBD);

    $nombre=$_POST["nombreAudio"];
    $formatoArchivo = $_FILES["archivoAudio"]["type"];
    $tamañoArchivo = $_FILES["archivoAudio"]["size"];
    $rutaTemporal = $_FILES["archivoAudio"]["tmp_name"];
    $correoUser = $_SESSION["datosUser"]["correo"];
    $tipoArchivo = $_POST["tipoAudio"];
    $nArchivo= $_FILES['archivoAudio']['name'];
    $visibilidad = $_POST["visibilidad"];
    $imagen = $_POST["imagen"];

    $resCount = $conexionCount->getOwnAudios($correoUser);
    $tipoUsuario = $_SESSION["datosUser"]["modalidad"];
    if( $tipoUsuario == "Free" && $resCount >=3 ){
        $conexion->cerrarConexion();
        $conexionCount->cerrarConexion();
        header("Location:index.php?ctl=verMsgError&ctlSecundario=ver_frmSubida");
    }else{
        $resultado = $conexion->subirArchivoAudio($nombre,$nArchivo,$rutaTemporal,$formatoArchivo,$tamañoArchivo,$correoUser,$tipoArchivo,$imagen,$visibilidad);
        $conexion->cerrarConexion();
        $conexionCount->cerrarConexion();
        if($resultado == "Exito"){
            header("Location:index.php?ctl=verOwnAudios");
        }else{
            header("Location:index.php?ctl=verMsgError&ctlSecundario=ver_frmSubida&ctlError=falloSubida");
        }
        
    }
?>