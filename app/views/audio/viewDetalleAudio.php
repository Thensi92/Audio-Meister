    <div class="media">
<div id="caja-reproductor">
        <div class="media-body">
            <div id="player">
                <div id="botonPlay">
                    <button id="play" onclick="playOrPauseSong()"><img src="web/html/body/img/Pause.png" /></button>
                </div>
                <div id="seek-bar">
                    <div id="fill"></div>
                    <div id="handle"></div>
                </div>
                <div id="datos-audio">
                    <div class="form-group">
                        <label for="nombreAudio">Nombre Audio</label>
                        <input type="text" class="form-control" value="<?php echo $arrayDatos["nombre"];?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Duracion</label>
                        <input type="text" class="form-control" value="<?php echo $arrayDatos["duracion"];?>" disabled>
                    </div>

                    <div id="imagen-reproductor">
                        <img src="web/html/body/img/Poster1.png" id="imagen-reproductor" class="align-self-center mr-2"
                        alt="Imagen del reproductor">
                    </div>
                </div>
                <?php
                $url = $arrayDatos["rutaAudio"];
                $nombre = $arrayDatos["nombre"];
                $id = $arrayDatos["id"];

            echo '<ul class="list-group list-group-horizontal-md">
                    <li class="list-group-item"> <a href=\'index.php?ctl=descargaAudio&url=$url&nombre=$nombre\'>Descargar</a></li>
                    <li class="list-group-item"><a href="index.php?ctl=verComentarios&id='.$id.'">Ver Comentarios</a></li>';
                    //Si esta logeado muestra la opcion de subir el Audio
                    if(isset($_SESSION["datosUser"]))
                    {
                        echo '<li class="list-group-item"><a href="index.php?ctl=verFrmComentario&id='.$id.'">Subir Comentarios</a></li>';
                    }
                   
                 echo '</ul>';
            ?>
            </div>
        </div>
    </div>
</div>
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