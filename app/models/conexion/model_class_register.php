<?php

Class Register extends Conexion {

    function __construct($host,$usu,$pass,$db){
        parent:: __construct($host,$usu,$pass,$db);
    }

    public function registarUsuario($arrayDatosUser){

        $correo;
        $nombre;
        $apodo;
        $passwd;
        $modalidad;
        $rol = "user"; //POR DEFECTO
        
        for($i = 0; $i < count($arrayDatosUser);$i++){
            if($i == 0){
                $correo = $arrayDatosUser[$i];
            }
            if($i == 1){
                $nombre = $arrayDatosUser[$i];
            }
            if($i == 2){
                $apodo = $arrayDatosUser[$i];
            }
            if($i == 3){
                $passwd = $arrayDatosUser[$i];
            }
            if($i == 4){
                $modalidad = $arrayDatosUser[$i];
            }
        }

        $sql = "INSERT INTO usuarios (correo,nombre,apodo,passwd,modalidad,rol) VALUES(?,?,?,?,?,?)";
        $stmt = $this->conexion->prepare($sql);
        
        $stmt->bind_param("ssssss",$correo,$nombre,$apodo,$passwd,$modalidad,$rol);

        $stmt->execute();
        $stmt->close();

    }

    public function cerrarConexion(){
        parent::cerrarConexion();
    }
}