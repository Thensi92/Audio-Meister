    <div id="view_product">
    
    <?php
    if(!empty($voz)) {
        echo '<h1 class="titulos_generos">NOTAS DE AUDIO</h1>';
            
        echo '<div id="podcast" class="posicionamientoFlexible">';
        foreach($voz as $row){
            echo '<div id="caja-tarjeta" class="card" style="width: 18rem;">';
            echo '<img class="card-img-top" src='.$row["ruta_imagen_audio"].'>';
            
            echo '<div class="card-body">';
            echo '<h5 class="card-title">'.$row["nombre_audio"].'</h5>';
            echo '<a href="index.php?ctl=detalleAudio&&id='.$row["id_audio"].'" class="btn btn-primary">Ver</a>';
            echo '</div>';
            
            echo '</div>';
        }
        echo '</div>';
    ?>   
    </div>

    <?php
    echo "<center>";
        echo "<div>";
            $pagination->pages("btn btn-primary");
        echo "</div>";
    echo "</center>";
    
    }else{
        require_once("app/views/errores/vista_podcastVacio.php");
    }
    ?>