    <div id="view_product">
    
    <?php
    if(!empty($podcast)) {
        echo '<h1 class="titulos_generos">PODCAST</h1>';
        
        echo '<div id="podcast" class="posicionamientoFlexible">';
        foreach($podcast as $key => $value){
            echo '<div id="caja-tarjeta" class="card" style="width: 18rem;">';
            echo '<img class="card-img-top" src='.$value["ruta_imagen_audio"].'>';
            
            echo '<div class="card-body">';
            echo '<h5 class="card-title">'.$value["nombre_audio"].'</h5>';
            echo '<a href="index.php?ctl=detalleAudio&&id='.$value["id_audio"].'" class="btn btn-primary">Ver</a>';
            echo '</div>';
            
            echo '</div>';
        }
        echo '</div>';
        ?>   
    </div>

    <?php
    }else{
        require_once("app/views/errores/vista_podcastVacio.php");
    }
    ?>