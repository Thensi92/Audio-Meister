<?php

Class Login extends Conexion {

    function __construct($host,$usu,$pass,$db){
        parent:: __construct($host,$usu,$pass,$db);
    }

    private function getPasswd($correo){
        $sql = "SELECT passwd FROM usuarios WHERE correo = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("s",$correo);
        $stmt->execute();

        $stmt->bind_result($passwd);
        $stmt->fetch();

        return $passwd;
    }

    public function loginUsuario($correo, $_passwd){

        $passHash = $this->getPasswd($correo);

        if(password_verify($_passwd, $passHash)){
            $sql = "SELECT * FROM usuarios WHERE correo = ? AND passwd = ?";
                    
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("ss",$correo, $passHash);
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

    }

    public function cerrarConexion(){
        parent::cerrarConexion();
    }
}

?>