<?php
    //MODELOS
    require_once("app/db/config.php");
    require_once("app/models/conexion/model_conexion_BBDD.php");
    require_once("app/models/usuario/Usuario.php");

    $correo = $_SESSION["datosUser"]["correo"];
    $pass = $_SESSION["datosUser"]["passwd"];
    $eliminado = false;

    $conectionUser = new Usuario(Config::$metodoConexion, Config::$usuario, Config::$contraseña, Config::$nombreBaseDatos);
    
    if($conectionUser->eliminarUsuario($correo, $pass)){
        $eliminado = true;
    }
    
    $conectionUser->cerrarConexion();

    if($eliminado){

        eliminar_directorio("web/musica/".$correo."/");
        $mensaje = 'Se ha eliminado con éxito.</a>';
        unset($_POST);
        header("Location: index.php?ctl=desconectar");
    }else{
        $mensaje = "Error: No se ha podido eliminar. Por favor, inténtelo de nuevo";
        //Vista
        //require_once("app/views/usuario/EliminarUsuarioView.php");
        echo $mensaje;
    }

    function eliminar_directorio($dir){
        $directorio = opendir($dir);
        while ($archivo = readdir($directorio)){
            if( $archivo !='.' && $archivo !='..' ){
                if ( is_dir( $dir.$archivo ) ) {
                    eliminar_directorio( $dir.$archivo );
                }
            unlink($dir."/".$archivo);
            }
        }
        closedir($directorio);
        rmdir($dir);
    }

?>