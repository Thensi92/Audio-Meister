<section>
        <form action="index.php?ctl=insertar_audio" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="nombreAudio">Nombre Audio</label>
                <input type="text" class="form-control" id="nombreAudio" name="nombreAudio" placeholder="Introduzca el nombre del audio" required>
            </div>
            <div class="form-group">
                <input type="file" name="archivoAudio" id="archivo" required>
            </div>
            <div clas="form-control">
                <label for="tipoAudio">Tipo Audio</label>
                <select class="custom-select" id="tipoAudio" name="tipoAudio">
                    <option value="1" selected>Podcast</option>
                    <option value="2">Nota Audio</option>
                    <option value="3">Musica</option>
                </select>
            </div>
            <button type="submit" name="insertar_audio" class="btn btn-primary">Subir</button>
        </form>
            <?php
        
        if(isset($_SESSION["mensaje"])){
            $mensaje=$_SESSION["mensaje"];
            echo("<script type='text/javascript'>alert('$mensaje'); </script>"); 
        }
    ?>
</section>