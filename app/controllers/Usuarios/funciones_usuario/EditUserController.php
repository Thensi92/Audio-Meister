<?php
    if(!empty($_SESSION['datosUser'])){
        require_once("app/db/config.php");
        require_once("app/models/conexion/model_conexion_BBDD.php");
        require_once("app/models/usuario/Usuario.php");

        $usuario = new Usuario(Config::$metodoConexion, Config::$usuario, Config::$contraseña, Config::$nombreBaseDatos);
        $oldEmail = $_SESSION["datosUser"]["correo"];
        $oldPasswd= $_SESSION["datosUser"]["passwd"];
        
        
        if(isset($_POST["editar_usuario"])){

            $nuevosDatos = array();

            foreach($_POST as $key=>$value){
                if($value != "editar_usuario"){
                    $nuevosDatos[$key] = $value;
                }
            }

            if($usuario->editarDatos($oldEmail, $oldPasswd, $nuevosDatos)){
                
                //pasar los datos a la variable $_SESSION
                $newEmail = $nuevosDatos["correo"];
                $newPasswd = $nuevosDatos["passwd"];
                $datosUsuario = $usuario->getUsuario($newEmail, $newPasswd);
                
                $_SESSION['datosUser'] = $datosUsuario;
                $usuario->cerrarConexion();
            }
            
            header("Location: index.php?ctl=perfil");
        }else{
            //CARGAR VISTA
            require_once("app/views/usuario/EditUser.view");
        }
        $usuario->cerrarConexion();
    }else{
        header("Location: index.php?ctl=login");
    }
?>