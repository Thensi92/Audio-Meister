<?php

require_once("app/db/config.php");
require_once("app/models/conexion/model_conexion_BBDD.php");
require_once("app/models/conexion/model_class_login.php");
require_once("app/models/conexion/model_class_register.php");

$host = Config::$metodoConexion;
$usu = Config::$usuario;
$pass = Config::$contraseña;
$db = Config::$nombreBaseDatos;

$registro = new Register($host,$usu,$pass,$db);
$login = new Login($host,$usu,$pass,$db);

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

$registro->registarUsuario($arrayDatosUser);
$registro->cerrarConexion();

$_SESSION['datosUser'] = $login->loginUsuario($correo, $passwd);

if(isset($_SESSION['datosUser']['correo'])){
    header("Location:index.php");
}

?>