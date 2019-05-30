<?php
    class Audio extends Conexion{

        public function subirArchivoAudio($nombre,$nArchivo,$rutaTemporal,$formato,$tamanio,$correoUser,$tipo, $rutaImagen , $visibilidad){
            $tipoDefecto = "audio/mp3";
            $tipoDefecto2 = "audio/mpeg";
            $rutaConst = "web/musica/".$correoUser."/";
            $rutaDefinitiva = $rutaConst.$nArchivo;
            $tamanioMaximo = 16777216;
            
            $tipoCasteado = (int)$tipo;
            $codigo = rand(1,1000);
            if(file_exists($rutaDefinitiva)){
                copy($rutaDefinitiva,$rutaConst.$codigo.$nArchivo);
                $rutaDefinitiva = $rutaConst.$codigo.$nArchivo;
            }
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

        
                            $sql ="INSERT INTO audios (nombre_audio, ruta_audio, ruta_imagen_audio, duracion, correo, id_tipo, visibilidad) VALUES (?,?,?,?,?,?,?)";
                            
                            $resultado = $this->conexion->prepare($sql);
                            $resultado->bind_param("sssssis",$nombre,$rutaDefinitiva,$rutaImagen,$duracion,$correoUser,$tipoCasteado,$visibilidad);
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
            $sql = "SELECT id_audio FROM audios WHERE correo = ?";
            $resultado = $this->conexion->prepare($sql);
            $resultado->bind_param("s",$correoUser);
            $resultado->execute();
            $resultado->bind_result($id);
            $listaAudio = array();
            while($resultado->fetch()){
                array_push($listaAudio,$id);
            }
            $tamañoArray = count($listaAudio);
            
            return $tamañoArray;
        }

        public function buscarAudio($id){
            $sql = "SELECT * FROM audios WHERE id_audio = ?";
            $resultado = $this->conexion->prepare($sql);
            $resultado->bind_param("i",$id);
            $resultado->execute();
            $resultado->bind_result($id,$nombre,$ruta,$rutaImagen,$duracion,$fechaSubida,$correoUser,$tipo, $visibilidad);
            $resultado->fetch();

            $datosAudio = [
                'id' => $id,
                'nombre' => $nombre,
                'rutaAudio' => $ruta,
                'rutaImagen' => $rutaImagen,
                'duracion' => $duracion,
                'fechaSubida' => $fechaSubida,
                'correoUsuario' => $correoUser,
                'tipo' => $tipo,
                'visibilidad' => $visibilidad
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

        public function editarAudio($id,$nombre,$correoUser,$tipo,$modificarAudio,$nArchivo,$rutaTemporal,$formato,$tamanio,$rutaArchivoAntiguo,$rutaImagen,$visibilidad){
            $tipoDefecto = "audio/mp3";
            $rutaConst = "web/musica/".$correoUser."/";
            $rutaDefinitiva = $rutaConst.$nArchivo;
            $tamanioMaximo = 16777216;
            $tipoCasteado = (int)$tipo;

            if($modificarAudio)
            {  
                unlink($rutaArchivoAntiguo);
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

                                 $sql ="UPDATE  audios SET nombre_audio = ? , ruta_audio = ?, ruta_imagen_audio = ?, duracion =? , id_tipo=? , visibilidad =? WHERE correo = ? AND id_audio = ?";
                                 $resultado = $this->conexion->prepare($sql);
                                 $resultado->bind_param("ssssissi",$nombre,$rutaDefinitiva,$rutaImagen,$duracion,$tipoCasteado,$visibilidad,$correoUser,$id);
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
                $sql = "UPDATE audios SET nombre_audio = ? , id_tipo = ?, ruta_imagen_audio = ? , visibilidad = ?   WHERE correo = ? AND id_audio = ?";
                $resultado = $this->conexion->prepare($sql);
                $resultado->bind_param("sisssi",$nombre,$tipoCasteado,$rutaImagen,$visibilidad,$correoUser,$id);
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