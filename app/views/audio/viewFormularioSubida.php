<?php

if (!isset($_SESSION['datosUser'])) {
    header("location: index.php");
}

include "app/controllers/audio/controller_errorUsuarioAudio.php";
?>
<form id="form" action="index.php?ctl=insertar_audio&tipoOperacion=añadir" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="nombreAudio">Nombre Audio</label>
        <input type="text" class="form-control" id="nombreAudio" name="nombreAudio" placeholder="Introduzca el nombre del audio" required>
    </div>

    <div clas="form-control">
        <label for="tipoAudio">Tipo Audio</label>
        <select class="custom-select" id="tipoAudio" name="tipoAudio">
            <option value="1" selected>Podcast</option>
            <option value="2">Nota Audio</option>
            <option value="3">Musica</option>
        </select>
    </div>


    <div class="form-group">
        <label for="visibilidad">Visibilidad</label>
        <select class="custom-select" id="visibilidad" name="visibilidad">
            <option value="1" selected>Publico</option>
            <option value="0">Privado</option>
        </select>
    </div>

    <div class="form-group">
        <label>Imagen</label>
        <select class="custom-select" id="imagen" name="imagen">
            <option value="web/html/body/img/Poster1.png" selected>Imagen 1</option>
            <option value="web/html/body/img/Poster2.png">Imagen 2</option>
            <option value="web/html/body/img/Poster3.png">Imagen 3</option>
        </select>
    </div>

    <div id="imagen-personal" class="form-group">
        <label>Subir imagen desde dispositivo</label><br>
        <input type="file" name="imagenPersonal" id="imagenPersonal">
    </div>

    <div id="div.file" class="form-group">
        <label>Subir archivo .mp3</label><br>
        <input type="file" name="archivoAudio" id="archivo" required>
    </div>
    <button type="submit" name="insertar_audio" class="btn btn-primary">Subir</button>
</form>