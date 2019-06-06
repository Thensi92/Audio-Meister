<?php
    require_once("app/db/config.php");
    include "app/models/conexion/model_conexion_BBDD.php";
    include "app/models/model_audio.php";
    include "app/lib/getid3/getid3.php";
   
    $idAudioDetalle = $_GET["id"];

    $metConexion = Config::$metodoConexion;
    $user= Config::$usuario;
    $contra = Config::$contraseña;
    $nombreBD = Config::$nombreBaseDatos;
    $conexion = new Audio($metConexion,$user,$contra,$nombreBD);

    $nombre=$_POST["nombreAudio"];
    $correoUser = $_SESSION["datosUser"]["correo"];
    $boolEditarAudio = false;
    $id=$_GET["id"];
    $tipoArchivo = $_POST["tipoAudio"];
    $rutaArchivoAntiguo = $_SESSION["audioBorrar"]["ruta"] ;
    $visibilidad = $_POST["visibilidad"];
    $visibilidadInt = (int) $visibilidad;

    if(!empty($_FILES["archivoAudio"]["type"] )){
        $formatoArchivo = $_FILES["archivoAudio"]["type"];
        $tamañoArchivo = $_FILES["archivoAudio"]["size"];
        $rutaTemporal = $_FILES["archivoAudio"]["tmp_name"];
        $nArchivo= $_FILES['archivoAudio']['name'];
        $boolEditarAudio = true;
    }else{
        $formatoArchivo = "null";
        $tamañoArchivo = "null";
        $rutaTemporal = "null";
        $nArchivo= "null";
    }

    if(is_uploaded_file($_FILES["imagenPersonal"]["tmp_name"])){
        $imagen     =   $_FILES["imagenPersonal"]["tmp_name"];
        $nombreImagen = $_FILES["imagenPersonal"]["name"];
    }else{
        $imagen     =   $_POST["imagen"];
        $nombreImagen = "";
    }
                                        
    $resultado = $conexion->editarAudio($id,$nombre,$correoUser,$tipoArchivo,$boolEditarAudio,$nArchivo,$rutaTemporal,$formatoArchivo,$tamañoArchivo,$rutaArchivoAntiguo,$imagen, $nombreImagen, $visibilidadInt);
    $conexion->cerrarConexion();
    if($resultado == "Exito"){
        header("Location:index.php?ctl=verOwnAudios");
    }else{
        header("Location:index.php?ctl=verMsgError&ctlSecundario=verOwnAudios&ctlError=falloEditar");
    }
   
?>