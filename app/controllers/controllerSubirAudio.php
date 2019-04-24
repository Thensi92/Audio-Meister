<?php
    session_start();
    include "app/db/config.php";
    include "app/models/model_conexion_BBDD.php";
    include "app/models/Audio.php";
    include "app/lib/getid3/getid3.php";

    $conexion = new Modelo(config::$metodoConexion,config::$usuario,config::$contraseña,config::$nombreBaseDatos);
    $nombre = $_POST["nombre"];
    $tipoArchivo = $_FILES["archivo"]["type"];
    $tamañoArchivo = $_FILES["archivo"]["size"];
    $direccionTemporal = $_FILES["archivo"]["tmp_name"];
    $idUser = $_SESSION["usuario"]["idUsuario"];//Obtiene de los datos de la sesion

    $resultado = $conexion->subirArchivoAudio($nombre,$direccionTemporal,$tipoArchivo,$tamañoArchivo,$idUser);
    if(is_bool($resultado)){
        //Se realizo con exito(porque retorna true), volver a la pagina principal o la que veais
    }else{
        echo $resultado; //Ha fallado por lo que devuelve una caja con el mensaje de error
    }
?>