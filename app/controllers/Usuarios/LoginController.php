<?php
    require_once("app/db/config.php");
    require_once("app/models/conexion/model_conexion_BBDD.php");
    require_once("app/models/conexion/model_class_login.php");

    $login = new Login(Config::$metodoConexion, Config::$usuario, Config::$contraseña, Config::$nombreBaseDatos);
    
    $correo = $_POST['correo'];
    $passwd = $_POST['pass'];
        
    $_SESSION['datosUser'] = $login->loginUsuario($correo, $passwd);
    
    if(isset($_SESSION['datosUser']['correo'])){
        header("Location:index.php");
    }else {
        require_once("app/views/mensajes_error/errorLogin.php");
    }
    
    $login->cerrarConexion();
    
?>