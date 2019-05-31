<?php
    include "app/db/config.php";
    include "app/models/conexion/model_conexion_BBDD.php";
    include "app/models/comentario/model_comentario.php";

    $metConexion = Config::$metodoConexion;
    $user= Config::$usuario;
    $contra = Config::$contraseña;
    $nombreBD = Config::$nombreBaseDatos;

    $conexion = new Comentario($metConexion,$user,$contra,$nombreBD);
    $idAudio = $_GET["id"];
    $idComentario = $_GET["idComentario"];
    $idCasteado = (int) $idComentario;
    $resultado = $conexion->borrarComentario($idCasteado);
    header("Location:index.php?ctl=detalleAudio&id=$idAudio");
?>