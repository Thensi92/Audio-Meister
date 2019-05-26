<?php

    class Usuario{

        private $conexionUsuario;

        function __construct($host, $user, $passwd, $nameDB){
            $this->conexionUsuario = new Conexion($host, $user, $passwd, $nameDB);
        }

        public function getApodo($correo, $pass){
            $stmt = $this->conexionUsuario->conexion->prepare(
                "SELECT apodo FROM usuarios WHERE correo = ? AND passwd = ?");

            if($stmt){
                $stmt->bind_param("ss", $correo, $passwd);
                $stmt->execute();
                $stmt->bind_result($apodo);
            }
            $stmt->close();

            return $apodo;
        }

        public function getDatos($correo, $passwd){
            //DEVOLVER DATOS DE USUARIO
            $stmt = $this->conexionUsuario->conexion->prepare(
                "SELECT * FROM usuarios WHERE correo = ? AND passwd = ?");

            if($stmt){
                $stmt->bind_param("ss", $correo, $passwd);
                $stmt->execute();
                $resultado = $stmt->get_result();
                $datosUsuario = $resultado->fetch_assoc();
            }
            $stmt->close();
            return $datosUsuario;
        }

        public function modificarUsuario($oldEmail, $oldPasswd, $nuevosDatos){
            //EDITAR DATOS DE USUARIO. COMPARAR LOS NUEVOS DATOS CON LOS DE SESION

            $editado = false;
            
            //Si el correo anterior es igual al del array no intentará cambiar la clave principal
            if($oldEmail==$nuevosDatos["correo"]){
                $stmt = $this->conexionUsuario->conexion->prepare(
                    "UPDATE usuarios SET
                    nombre = ?, apodo = ?, passwd = ?,
                    modalidad = ? 
                    WHERE correo = ? AND passwd = ?");
            }else{
                $stmt = $this->conexionUsuario->conexion->prepare(
                    "UPDATE usuarios SET correo = ? ,
                    nombre = ?, apodo = ?, passwd = ?,
                    modalidad = ? 
                    WHERE correo = ? AND passwd = ?");
            }
            
            //Si el correo anterior es igual al del array no intentará cambiar la clave principal
            if($stmt){
                if($oldEmail==$nuevosDatos["correo"]){
                    $stmt->bind_param("ssssss", $nuevosDatos["nombre"],
                    $nuevosDatos["apodo"], $nuevosDatos["passwd"],
                    $nuevosDatos["modalidad"], $oldEmail, $oldPasswd);
                }else{
                    $stmt->bind_param("sssssss", $nuevosDatos["correo"], $nuevosDatos["nombre"],
                    $nuevosDatos["apodo"], $nuevosDatos["passwd"],
                    $nuevosDatos["modalidad"], $oldEmail, $oldPasswd);
                }
                //print_r($nuevosDatos);
                $stmt->execute();
                if($stmt->affected_rows == 1){
                    $editado = true;
                }
            }
            return $editado;
        }

        public function eliminarUsuario($correo, $passwd){
            $usuarioEliminado = false;
            $stmt = $this->conexionUsuario->conexion->prepare(
                "DELETE FROM usuarios WHERE correo = ? AND passwd = ?"
            );
            
            if($stmt){
                $stmt->bind_param("ss", $correo, $passwd);
                $stmt->execute();
                if($stmt->affected_rows == 1){
                    $usuarioEliminado = true;
                }
                $stmt->close();
            }
            return $usuarioEliminado;
        }

        public function cerrarConexion(){
            $this->conexionUsuario->cerrarConexion();
        }
    }
?>