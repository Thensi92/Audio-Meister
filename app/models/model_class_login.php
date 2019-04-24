<?php

Class Login extends Conexion {

    function __construct($host,$usu,$pass,$db){
        parent:: __construct($host,$usu,$pass,$db);
    }

    public function loginUsuario($correo,$passwd){

        $sql = "SELECT correo,passwd FROM usuarios 
                WHERE correo = ? AND passwd = ?";
                
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ss",$correo,$passwd);
        $stmt->execute();

        $stmt->bind_result($correo,$nombre,$apodo,$modalidad,$rol);
        $stmt->fetch_assoc();

        $array = [$correo,$nombre,$apodo,$modalidad,$rol];

        $_SESSION = [
            "datosUser" => $array
        ];
            
        $stmt->close();

    }

    public function cerrarConexion(){
        parent::cerrarConexion();
    }
}