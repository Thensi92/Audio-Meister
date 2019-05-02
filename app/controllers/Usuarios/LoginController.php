<?php
    require_once("app/db/config.php");
    require_once("app/model_conexion_BBDD.php");
    require_once("app/models/usuario/Usuario.php");

    $login = new Login(Config::$host, Config::$user, Config::$pass, Config::$nameDb);
    
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];
        
    $datosUsuario = $login->loginUsuario($correo, $pass);
    $login->cerrarConexion();
?>