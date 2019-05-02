<?php
    require_once("app/db/config.php");
    require_once("app/models/model_conexion_BBDD.php");
    require_once("app/models/model_class_login.php");

    $login = new Login(Config::$metodoConexion, Config::$usuario, Config::$contraseña, Config::$nombreBaseDatos);
    
    $correo = $_POST['correo'];
    $passwd = $_POST['pass'];
        
    $_SESSION['datosUser'] = $login->loginUsuario($correo, $passwd);
    header("Location:index.php");
    
    $login->cerrarConexion();
?>