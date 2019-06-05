<?php

require_once('app/db/config.php');
require_once("app/models/conexion/model_conexion_BBDD.php");
require_once("app/models/model_audio.php");

$host = Config::$metodoConexion;
$usu = Config::$usuario;
$pass = Config::$contraseña;
$db = Config::$nombreBaseDatos;

$audio = new Audio($host,$usu,$pass,$db);

$podcast = array();
$voz = array();
$musica = array();

    if(isset($_GET['ctl'])){
        
        $genero = $_GET['tipo_genero'];

        if($_GET['tipo_genero'] == 1){
            $podcast = $audio->filtrarPorGenero($genero);
        }else if($_GET['tipo_genero'] == 2){
            $voz = $audio->filtrarPorGenero($genero);
        }else if($_GET['tipo_genero'] == 3){
            $musica = $audio->filtrarPorGenero($genero);
        }

        $audio->cerrarConexion();
    }


?>