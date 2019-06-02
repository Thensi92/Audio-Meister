<script>
    function mostrar() {
        obj = document.getElementById("archivo");
        obj.style.visibility = (obj.style.visibility == 'hidden') ? 'visible' : 'hidden';
    }
</script>
<form id="form" action="index.php?ctl=editar_audio&id=<?=$arrayDatos["id"]?>" method="POST"
    enctype="multipart/form-data">
    <div class="form-group">
        <label for="nombreAudio">Nombre Audio</label>
        <input type="text" class="form-control" id="nombreAudio" name="nombreAudio" value="<?=$arrayDatos["nombre"]?>"
            required>
    </div>

    
    <div clas="form-control">
        <label for="tipoAudio">Tipo Audio</label>
        <select class="custom-select" id="tipoAudio" name="tipoAudio" required>
            <?php
                            $tipoAudio = $arrayDatos["tipo"];
                            if($tipoAudio == "1"){
                                echo '<option value="1" selected>Podcast</option>
                                <option value="2">Nota Audio</option>
                                <option value="3">Musica</option>';
                            }else if($tipoAudio == "2"){
                                echo '<option value="1">Podcast</option>
                                <option value="2" selected>Nota Audio</option>
                                <option value="3">Musica</option>';
                            }else if($tipoAudio == "3"){
                                echo '<option value="1">Podcast</option>
                                <option value="2">Nota Audio</option>
                                <option value="3" selected>Musica</option>';
                            }
                            ?>
        </select>
        
        <div class="form-group">
            <label for="visibilidad">Visibilidad</label>
            <select class="custom-select" id="visibilidad" name="visibilidad">
                <?php
                                    $visibilidad = $arrayDatos["visibilidad"];
                                    if($visibilidad == 1){ 
                                        echo '<option value="1" selected>Publico</option>
                                        <option value="0">Privado</option>';
                                    }else if($visibilidad == 0){
                                        echo '<option value="1">Publico</option>
                                        <option value="0" selected>Privado</option>';
                                    }
                                    ?>
            </select>
        </div>
        
        <div class="form-group">
            <label>Imagen</label>
            <select class="custom-select" id="imagen" name="imagen">
                <?php
                                $rutaImagen = $arrayDatos["rutaImagen"];
                                
                                if($rutaImagen == "web/html/body/img/Poster1.png"){
                                    echo '<option value="web/html/body/img/Poster1.png" selected>Imagen 1</option>
                                    <option value="web/html/body/img/Poster2.png">Imagen 2</option>
                                          <option value="web/html/body/img/Poster3.png">Imagen 3</option>';
                                          
                                        }else if($rutaImagen == "web/html/body/img/Poster2.png"){
                                            
                                            echo '<option value="web/html/body/img/Poster1.png">Imagen 1</option>
                                            <option value="web/html/body/img/Poster2.png" selected>Imagen 2</option>
                                            <option value="web/html/body/img/Poster3.png">Imagen 3</option>';
                                            
                                        }else if($rutaImagen == "web/html/body/img/Poster3.png"){
                                            
                                            echo '<option value="web/html/body/img/Poster1.png">Imagen 1</option>
                                            <option value="web/html/body/img/Poster2.png">Imagen 2</option>
                                          <option value="web/html/body/img/Poster3.png" selected>Imagen 3</option>';
                                          
                                        }
                                        ?>
            </select>
        </div>
    </div>
    <b>Cambiar Audio</b>
    <input type="checkbox" name="check" id="check" value="1" onchange="mostrar()" />

    <div id="archivo" class="form-group" style="visibility:hidden">
        <input type="file" id="archivoInput" name="archivoAudio" id="archivo">
    </div>

    <div id="opciones-edicion">
        <button type="submit" name="editar_audio" class="btn btn-primary">Editar</button>
        <a class="btn btn-danger" href="index.php?ctl=verMsg&ctlSecundario=eliminarAudio" role="button">Borrar</a>
    </div>

</form>