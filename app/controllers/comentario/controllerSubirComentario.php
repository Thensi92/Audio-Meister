<?php
    require_once("app/db/config.php");
    include "app/models/conexion/model_conexion_BBDD.php";
    include "app/models/comentario/model_comentario.php";

    $metConexion = Config::$metodoConexion;
    $user= Config::$usuario;
    $contra = Config::$contraseña;
    $nombreBD = Config::$nombreBaseDatos;

    $conexion = new Comentario($metConexion,$user,$contra,$nombreBD);

    $correo = $_GET["correo"];
    $idAudio = $_GET["idAudio"];
    $descripcion = $_POST["comentario"];
    $resultado = $conexion->subirComentario($descripcion,$correo,$idAudio);
    if($resultado == 1){
        header("Location:index.php?ctl=detalleAudio&id=$idAudio");
    }else{
        header("Location:index.php?ctl=verMsgError&ctlSecundario=ver_frmSubida&ctlError=falloSubida");
    }  
?>