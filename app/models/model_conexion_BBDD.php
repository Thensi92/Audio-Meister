<?php

class Conexion {

    public $conexion;

    function __construct($host,$usu,$pass,$db){
        $this->conexion = new mysqli($host,$usu,$pass,$db);
        if($this->conexion->connect_error){
            die('Error de Conexion ('.$conexion->connect_errno.')'.$conexion->connect_error);
        }
    }

    public function comprobarCampos($array){
        $estaVacio = false;
        $indice = 0;
    
        while($indice < count($_POST) && !$estaVacio){
            foreach($_POST as $nombre => $valor){
                if(empty($_POST["$nombre"])){
                    $estaVacio = true;
                }
            }
            $indice++;
        }     
        return $estaVacio;
    }

    public function cerrarConexion(){
        $this->conexion->close();
    }

}