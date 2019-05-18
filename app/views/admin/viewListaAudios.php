 <?php
        echo '<ul class="list-group">';
        if(isset($correoUser)){
            echo '<li class="list-group-item list-group-item-success"><h3>Propietario:</h3>'.$correoUser.'</li>';
        }
            foreach($model as $row)
            {
                //Codificacion de los datos
                $id = base64_encode($row['id_audio']);
                $ruta = base64_encode($row["ruta_audio"]);
                $correo = base64_encode($row['correo']);

                echo '<li class="list-group-item list-group-item-info">'.$row['nombre_audio'].'<br><a class="btn btn-danger" href="index.php?ctl=eliminarAudioAdmin&id='.$id.'&ruta='.$ruta.'&correo='.$correo.'" role="button">Borrar</a></li>';
            }
        echo '</ul>';
?>