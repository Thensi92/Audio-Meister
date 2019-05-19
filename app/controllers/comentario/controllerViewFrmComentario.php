<?php
    $usuario = $_SESSION["datosUser"]["correo"];
    $idAudio = $_GET["id"];

    include "app/views/comentario/viewFrmComentario.php";
?>