<?php
    class Audio extends Conexion{

        public function subirArchivoAudio($nombre,$nArchivo,$rutaTemporal,$formato,$tamanio,$correoUser,$tipo){
            $tipoDefecto = "audio/mp3";
            $tipoDefecto2 = "audio/mpeg";
            $rutaConst = "web/musica/";
            $rutaDefinitiva = $rutaConst.$nArchivo;
            $tamanioMaximo = 16777216;
            $rutaImagen = "web/html/body/img/Poster1.png";
            $tipoCasteado = (int)$tipo;

            //Comprobacion del tipo de archivo subido
            if($formato == $tipoDefecto || $formato == $tipoDefecto2){
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

        
                            $sql ="INSERT INTO audios (nombre_audio, ruta_audio, ruta_imagen_audio, duracion, correo, id_tipo) VALUES (?,?,?,?,?,?)";
                            
                            $resultado = $this->conexion->prepare($sql);
                            $resultado->bind_param("sssssi",$nombre,$rutaDefinitiva,$rutaImagen,$duracion,$correoUser,$tipoCasteado);
                            $resultado->execute();

                            if($resultado->affected_rows == 1){
                                $mensaje = "Exito"; 
                            }else{
                                $mensaje = "Fallo en la subida del archivo"; 
                            }
                        }else{
                            $mensaje = "Fallo al mover el fichero"; 
                        }
                    }
            }else{
                $mensaje = "No has subido un archivo mp3 , o no has subido nada"; 
                echo "$formato";
            }
            return $mensaje;
        }

        public function getOwnAudios($correoUser){
            $sql = "SELECT * FROM audios WHERE correo = ?";
            $resultado = $this->conexion->prepare($sql);
            $resultado->bind_param("s",$correoUser);
            $resultado->execute();
            return $resultado;
        }

        public function buscarAudio($id){
            $sql = "SELECT * FROM audios WHERE id_audio = ?";
            $resultado = $this->conexion->prepare($sql);
            $resultado->bind_param("i",$id);
            $resultado->execute();
            $resultado->bind_result($id,$nombre,$ruta,$rutaImagen,$duracion,$fechaSubida,$correoUser,$tipo);
            $resultado->fetch();

            $datosAudio = [
                'id' => $id,
                'nombre' => $nombre,
                'rutaAudio' => $ruta,
                'rutaImagen' => $rutaImagen,
                'duracion' => $duracion,
                'fechaSubida' => $fechaSubida,
                'correoUsuario' => $correoUser,
                'tipo' => $tipo
            ];

            return $datosAudio;
        }

        public function borrarAudio($id,$correoUser,$url){
            $sql = "DELETE FROM audios WHERE id_audio = ? AND correo= ?";
            $resultado = $this->conexion->prepare($sql);
            $resultado->bind_param("is",$id,$correoUser);
            $resultado->execute();
            if($resultado->affected_rows == 1){
                if(unlink($url)){
                    $mensaje = "Exito";
                }else{
                    $mensaje = "Fallo en borrado de archivo en PC";
                }
            }else{
                $mensaje = "Fallo"; 
            }
            return $mensaje;
        }

        public function editarAudio($id,$nombre,$correoUser,$tipo,$modificarAudio,$nArchivo,$rutaTemporal,$formato,$tamanio){
            $tipoDefecto = "audio/mp3";
            $rutaConst = "musica/";
            $rutaDefinitiva = $rutaConst.$nArchivo;
            $tamanioMaximo = 16777216;
            $rutaImagen = "web/html/img/Poster1.png";
            $tipoCasteado = (int)$tipo;

            if($modificarAudio)
            {  
                if($formato == $tipoDefecto){

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

                                 $sql ="UPDATE  audios SET nombre_audio = ? , ruta_audio = ?, ruta_imagen_audio = ?, duracion =? , id_tipo=? WHERE correo = ? AND id_audio = ?";
                                 $resultado = $this->conexion->prepare($sql);
                                 $resultado->bind_param("ssssisi",$nombre,$rutaDefinitiva,$rutaImagen,$duracion,$tipoCasteado,$correoUser,$id);
                                 $resultado->execute();
                                
                                 if($resultado->affected_rows == 1){
                                    $mensaje = "Exito"; 
                                 }else{
                                   $mensaje = "Fallo en la subida del archivo"; 
                                 }

                                 
                            }else{
                                $mensaje = "Fallo al mover el fichero"; 
                            }
                    }

                }else{
                    $mensaje = "No has subido un archivo mp3, o nada";
                }
            }else{
                $sql = "UPDATE audios SET nombre_audio = ? , id_tipo = ? WHERE correo = ? AND id_audio = ?";
                $resultado = $this->conexion->prepare($sql);
                $resultado->bind_param("sisi",$nombre,$tipoCasteado,$correoUser,$id);
                $resultado->execute();

                if($resultado->affected_rows == 1){
                    $mensaje = "Exito"; 
                 }else{
                   $mensaje = "Fallo en la subida del archivo"; 
                 }
            }
            return $mensaje;
        }

        public function borrarUsuario($correo){
            $sql = "DELETE FROM usuarios WHERE correo = ?";
            $resultado = $this->conexion->prepare($sql);
            $resultado->bind_param("s",$correo);
            $resultado->execute();
            if($resultado->affected_rows == 1){
                $mensaje= "Exito";
            }else{
                $mensaje = "Fallo"; 
            }
            return $mensaje;
        }

    }
?>