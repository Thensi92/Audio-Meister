<?php
    class Audio extends Modelo{

        function __construct($host,$usu,$pass,$db){
            parent::__construct($host,$usu,$pass,$db);
        }

        public function subirArchivoAudio($nombre,$rutaTemporal,$tipo,$tamanio,$idUser){
            $tipoDefecto = "audio/mp3";
            $rutaConst = "musica/";
            $rutaDefinitiva = $rutaConst.$nombre;
            $tamanioMaximo = 104857600;
            $codigo = "NULL";
            $sql = "INSERT INTO Audio VALUES (?,?,?,?,?,?,?,?)";

            //Comprobacion del tipo de archivo subido
            if($tipo == $tipoDefecto){
                    if($tamanio > $tamanioMaximo){
                        $mensaje = "Has superado el tamaño permitido"; 
                        $caja = $this->hacerMensajeError($mensaje);
                    }else{

                        if(move_uploaded_file($rutaTemporal,$rutaDefinitiva)){

                            //Llamas a la libreria para sacar la duracion de la cancion
                            $filename =$rutaDefinitiva;
                            $getID3 = new getID3;
                            $file = $getID3->analyze($filename); 
                            $playtime_seconds = $file['playtime_seconds'];
                            $duracion = gmdate("H:i:s",$playtime_seconds);

                            $resultado = $this->conexion->prepare($sql);
                            $resultado->bind_param("isssdsii",$codigo,$nombre,$rutaDefinitiva,$duracion,$fecha,$tipo,$idUser,$tamanio);
                            $resultado->execute();
                            if($resultado->affected_rows == 1){
                                return true;//Se realizo con exito
                            }else{
                                $mensaje = "Fallo en la subida del archivo"; 
                                $caja = $this->hacerMensajeError($mensaje);
                            }
                        }else{
                            $mensaje = "Fallo al mover el fichero"; 
                            $caja = $this->hacerMensajeError($mensaje);
                        }
                    }
            }else{
                $mensaje = "No has subido un archivo mp3 , o no has subido nada"; 
                $caja = $this->hacerMensajeError($mensaje);
            }
            return $caja;
        }

        public getOwnAudios($idUsuario){
            $sql = "SELECT * FROM Audio WHERE Id_user = ?";
            $resultado = $this->conexion->prepare($sql);
            $resultado->bind_param("i",$idUsuario);
            return $resultado
        }

        public eliminarArchivoAudio($idUsuario,$nombre){
             $sql = "DELETE FROM Audio WHERE Id_user = ? AND Nombre = ?";
             $resultado = $this->conexion->prepare($sql);
             $resultado->bind_param("is",$idUsuario,$nombre);
             return $resultado;
        }

        public buscarAudio($id){
            $sql = "SELECT * FROM Audio WHERE Id = ?";
            $resultado = $this->conexion->prepare($sql);
            bind_param("i",$id);
            return $resultado;
        }
    }
?>