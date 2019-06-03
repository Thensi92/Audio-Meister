<div id="caja-reproductor">
    <div class="media">
        <div class="media-body">
<!-------------------------------- DETALLES DEL USUARIO -------------------------------------------------------------------------->
        <div id="caja-datos-imagen-reproductor">    
            <div id="datos-audio">
                <div class="form-group posicion-input">
                    <label for="nombreAutor">Autor</label>
                    <input type="text" class="form-control ancho-input" value="<?php echo $apodo;?>" disabled>
                </div>

                <div class="form-group posicion-input">
                    <label for="nombreAudio">Nombre Audio</label>
                    <input type="text" class="form-control ancho-input" value="<?php echo $arrayDatos["nombre"];?>" disabled>
                </div>

                <div class="form-group posicion-input">
                    <label>Duracion</label>
                    <input type="text" class="form-control ancho-input" value="<?php echo $arrayDatos["duracion"];?>" disabled>
                </div>
            </div>
<!------------------------------- IMAGEN REPRODUCTOR----------------------------------------------------------------------------->
                <div id="imagen-reproductor">
                    <img src="<?php echo $arrayDatos["rutaImagen"]; ?>" class="img-fluid" alt="Imagen del reproductor">
                </div>
            </div>
<!-------------------------------- BOTONES Y BARRA DE AUDIO ---------------------------------------------------------------------->
                <div id="player">
                    <div id="botonPlay">
                        <button id="play" onclick="playOrPauseSong()"><img src="web/html/body/img/Play.png" /></button>
                    </div>
                    <div id="seek-bar">
                        <div id="fill"></div>
                        <div id="handle"></div>
                    </div>
                </div>

<!----------------------------------- OPCIONES REPRODUCTOR --------------------------------------------------------------------------->
                <?php
                $url = $arrayDatos["rutaAudio"];
                $nombre = $arrayDatos["nombre"];
                $id = $arrayDatos["id"];
                
                echo "<div id=opciones-reproductor>";
                    echo "<button type=button class=opcion btn btn-light><a href=index.php?ctl=descargaAudio&url=$url&nombre=$nombre>Descargar</a></button>";
                    echo "<a href=#><img src='web/html/body/img/like.png' class='iconos-reproductor' alt='Icono de me gusta'></a>";
                    echo "<a href=#><img src='web/html/body/img/dislike.png' class='iconos-reproductor' alt='Icono de no me gusta'></a>";
                echo '</div>';
            ?>

        </div>
    </div>
</div>

<?php
require_once("app/controllers/comentario/controllerViewFrmComentario.php");
require_once("app/controllers/comentario/controllerVerComentarios.php");
?>
<!------------------------SCRIPT REPRODUCTOR ----------------------------------------------------------------------------------->
<script type="text/javascript">
    var songTitle = document.getElementById("songTitle");
    var fillBar = document.getElementById("fill");

    var song = new Audio();
    var currentSong = 0;    // it point to the current song

    window.onload = playSong;   // it will call the function playSong when window is load

    function playSong() {
        song.src = '<?php echo $arrayDatos["rutaAudio"];?>'  //Pone la src de la cancion que esta guardada en la sesion            
        song.play();    // play the song
    }

    function playOrPauseSong() {

        if (song.paused) {
            song.play();
            $("#play img").attr("src", "web/html/body/img/Pause.png");
        }
        else {
            song.pause();
            $("#play img").attr("src", "web/html/body/img/Play.png");
        }
    }

    song.addEventListener('timeupdate', function () {

        var position = song.currentTime / song.duration;

        fillBar.style.width = position * 100 + '%';
    });
</script>