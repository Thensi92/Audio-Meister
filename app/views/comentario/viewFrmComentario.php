<?php
if(!empty($_SESSION['datosUser'])){
    
    $usuario = $_SESSION["datosUser"]["correo"];
    $idAudio = $_GET["id"];

    echo '<form id="subida-comentarios" action="index.php?ctl=up&idAudio='.$idAudio.'&correo='.$usuario.'" method="post">';
        echo "<div class=form-group>";
        echo "<label for=comment>Escribe el comentario:</label>";
        echo "<textarea class=form-control rows=3 cols=95  name=comentario required></textarea>";
        echo "</div>";

        
    echo "<button type=submit name=subirComentario class='btn btn-primary'>Comentar</button>";
    echo "</form>";
}
