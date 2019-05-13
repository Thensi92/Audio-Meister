<?php

require_once('app/db/config.php');
require_once("app/models/conexion/model_conexion_BBDD.php");
require_once('app/controllers/audios/busquedaAudios.php');

$host = Config::$metodoConexion;
$usu = Config::$usuario;
$pass = Config::$contraseña;
$db = Config::$nombreBaseDatos;

$podcast = array();
$voz = array();
$musica = array();

foreach($model as $row){
    if($row['id_tipo'] == 1){
        $podcast[] = $row;
    }else if($row['id_tipo'] == 2){
        $voz[] = $row;
    }else if($row['id_tipo'] == 3){
        $musica[] = $row;
    }
}

?>