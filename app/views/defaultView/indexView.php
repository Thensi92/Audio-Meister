<?php
require_once('app/controllers/audios/indexViewController.php');
?>

<section>
    <div id="view_product">
    
    <?php
    if(!empty($podcast)) {
        echo '<div>Podcast</div>';
    }

    echo '<div id="podcast">';
    foreach($podcast as $row){
        echo '<div class="card" style="width: 18rem;">';
        echo '<img class="card-img-top" src='.$row["ruta_imagen_audio"].'>';
                    
        echo '<div class="card-body">';
        echo '<h5 class="card-title">'.$row["nombre_audio"].'</h5>';
        echo '<a href="index.php?ctl=detalleAudio&&id='.$row["id_audio"].'" class="btn btn-primary">Ver</a>';
        echo '</div>';
                    
        echo '</div>';
    }
    echo '</div>';

    if(!empty($voz)) {
        echo '<div>Voz</div>';
    }

    echo '<div id="voz">';
    foreach($musica as $row){
        echo '<div class="card" style="width: 18rem;">';
        echo '<img class="card-img-top" src='.$row["ruta_imagen_audio"].'>';
                    
        echo '<div class="card-body">';
        echo '<h5 class="card-title">'.$row["nombre_audio"].'</h5>';
        echo '<a href="index.php?ctl=detalleAudio&&id='.$row["id_audio"].'" class="btn btn-primary">Ver</a>';
        echo '</div>';
                    
        echo '</div>';
    }
    echo '</div>';

    if(!empty($musica)) {
        echo '<div>Musica</div>';
    }

    echo '<div id="musica">';
    foreach($musica as $row){
        echo '<div class="card" style="width: 18rem;">';
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
    ?>
    
</section>
