<?php
    require_once("app/db/config.php");
    include "app/models/conexion/model_conexion_BBDD.php";
    include "app/models/model_audio.php";

    $metConexion = Config::$metodoConexion;
    $user= Config::$usuario;
    $contra = Config::$contraseña;
    $nombreBD = Config::$nombreBaseDatos;

    $correo = base64_decode($_GET["correo"]);

    $conexion = new Audio($metConexion,$user,$contra,$nombreBD);

    $resultado = $conexion->borrarUsuario($correo);
    eliminar_directorio("web/musica/".$correo."/");
    
    function eliminar_directorio($dir){
        $result = false;
        if ($handle = opendir("$dir")){
            $result = true;
            while ((($file=readdir($handle))!==false) && ($result)){
                if ($file!='.' && $file!='..'){
                    if (is_dir("$dir/$file")){
                        $result = eliminar_directorio("$dir/$file");
                    } else {
                        $result = unlink("$dir/$file");
                    }
                }
            }
            closedir($handle);
            if ($result){
                $result = rmdir($dir);
            }
        }
        return $result;
    }
    header("Location:index.php?ctl=listarAllUser");
?>
