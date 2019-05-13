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

$genero_podcast;
$genero_voz;
$genero_musica;

foreach($model as $row){
    if($row['id_tipo'] == 1){
        $podcast[] = $row;
        $genero_podcast = $row['id_tipo'];
    }else if($row['id_tipo'] == 2){
        $voz[] = $row;
        $genero_podcast = $row['id_tipo'];
    }else if($row['id_tipo'] == 3){
        $musica[] = $row;
        $genero_podcast = $row['id_tipo'];
    }
}

?>