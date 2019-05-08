<?php

Class Login extends Conexion {

    function __construct($host,$usu,$pass,$db){
        parent:: __construct($host,$usu,$pass,$db);
    }

    public function loginUsuario($correo,$passwd){

        $sql = "SELECT * FROM usuarios WHERE correo = ? AND passwd = ?";
                
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ss",$correo,$passwd);
        $stmt->execute();

        $stmt->bind_result($correo,$nombre,$apodo,$passwd,$modalidad,$rol);
        $stmt->fetch();

        $array = [
            'correo' => $correo,
            'nombre' => $nombre,
            'apodo' => $apodo,
            'passwd' => $passwd,
            'modalidad' => $modalidad,
            'rol' => $rol
        ];
        
        $stmt->close();
        
        return $array;

    }

    public function cerrarConexion(){
        parent::cerrarConexion();
    }
}