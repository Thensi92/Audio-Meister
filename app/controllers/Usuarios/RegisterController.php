<?php

require_once("app/db/config.php");
require_once("app/models/conexion/model_conexion_BBDD.php");
require_once("app/models/conexion/model_class_register.php");

$host = Config::$metodoConexion;
$usu = Config::$usuario;
$pass = Config::$contraseña;
$db = Config::$nombreBaseDatos;

$conexion = new Register($host,$usu,$pass,$db);

$correo = $_POST['correo'];
$nombre = $_POST['nombre'];
$apodo = $_POST['apodo'];
$passwd = $_POST['pass'];
$modalidad = $_POST['modalidad'];


$arrayDatosUser = array(
    $correo,
    $nombre,
    $apodo,
    $passwd,
    $modalidad
);

$conexion->registarUsuario($arrayDatosUser);
$conexion->cerrarConexion();

header("Location:index.php");

?>