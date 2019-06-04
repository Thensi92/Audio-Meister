    <?php
    if(!empty($model)){
        echo "<div class=posicionamientoFlexible>";
        foreach($model as $row)
        {
            echo "
            <div id=\"caja-tarjeta\" class=\"card\" style=\"width: 12rem;\">
                <img id=\"imagenOwn\" src=\" ".$row['ruta_imagen_audio']." \" class=\"card-img-top\">
                <div class=\"card-body\" height:5rem; bg-success >
                    <h5 class=\"card-title\">".$row['nombre_audio']."</h5>
                    <a href=\"index.php?ctl=detalleAudio&id=".$row['id_audio']."\" class=\"btn-primary btn-sm\">Ver</a>
                    <a href=\"index.php?ctl=frmEditar&tipoOperacion=editar&id=".$row['id_audio']."\" class=\"btn-primary btn-sm\">Editar</a>
                </div>
            </div>";
        }
        echo "</div>";
    }else{
        require_once("app/views/errores/errorOwnAudios.php");
    }
    ?>