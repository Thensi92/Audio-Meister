 <section>   
    <script>
            function mostrar(){
                obj = document.getElementById("archivo");
                obj.style.visibility = (obj.style.visibility == 'hidden') ? 'visible' : 'hidden';
            }
    </script>
   <form action="index.php?ctl=editar_audio&id=<?=$arrayDatos["id"]?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
                    <label for="nombreAudio">Nombre Audio</label>
                    <input type="text" class="form-control" id="nombreAudio" name="nombreAudio" value="<?=$arrayDatos["nombre"]?>" required>
                </div>

                <b>Cambiar Audio</b>
                <input type="checkbox" name="check" id="check" value="1" onchange="mostrar()" />

                <div id="archivo" class="form-group" style="visibility:hidden">
                    <input type="file" id="archivoInput" name="archivoAudio" id="archivo">
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
                    <button type="submit" name="editar_audio" class="btn btn-primary">Editar</button>
                </div>
                <a class="btn btn-danger" href="index.php?ctl=eliminarAudio" role="button">Borrar</a>
</section>