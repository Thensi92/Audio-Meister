<section>
       <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="web/html/img/Poster1.png" >
            <div class="card-body">
                    <div id="player">
                        <div id="buttons">
                        <button id="play" onclick="playOrPauseSong()"><img src="web/html/img/Play.png"/></button>
                    </div>
                    <div id="seek-bar">
                        <div id="fill"></div>
                        <div id="handle"></div>
                    </div>
            </div>
        </div>
            <script type="text/javascript">

                var songTitle = document.getElementById("songTitle");
                var fillBar = document.getElementById("fill");
                
                var song = new Audio();
                var currentSong = 0;    // it point to the current song
                
                window.onload = playSong;   // it will call the function playSong when window is load
                
                function playSong(){
                    song.src = '<?php echo $arrayDatos["rutaAudio"];?>'  //Pone la src de la cancion que esta guardada en la sesion            
                    song.play();    // play the song
                }
                
                function playOrPauseSong(){
                    
                    if(song.paused){
                        song.play();
                        $("#play img").attr("src","web/html/img/Pause.png");
                    }
                    else{
                        song.pause();
                        $("#play img").attr("src","web/html/img/Play.png");
                    }
                }
                
                song.addEventListener('timeupdate',function(){ 
                    
                    var position = song.currentTime / song.duration;
                    
                    fillBar.style.width = position * 100 +'%';
                });
            </script>
         <div id="">
              <div class="form-group">
                <label for="nombreAudio">Nombre Audio</label>
                <input type="text" class="form-control" value="<?php echo $arrayDatos["nombre"];?>" disabled>
             </div>
            <div class="form-group">
                <label>Duracion</label>
                <input type="text" class="form-control" value="<?php echo $arrayDatos["duracion"];?>" disabled>
            </div>
        </div>
         <?php
                $url = $arrayDatos["rutaAudio"];
                $nombre = $arrayDatos["nombre"];
            
               echo " <a href='controllerDescarga.php?url=$url&nombre=$nombre'>Descargar</a>";
            ?>
</section>