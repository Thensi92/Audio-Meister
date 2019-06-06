<?php
$con = new Usuario(Config::$metodoConexion, Config::$usuario, Config::$contraseña, Config::$nombreBaseDatos);
foreach ($model as $row) {
    $correo = $row["correo"];
    $descripcion = $row["descripcion"];
    $idAudio = $row["id_audio"];
    $idComentario = $row["id_comentario"];

    $apodo = $con->getApodo($correo);

    if (!empty($_SESSION['datosUser'])) {
        echo "<div class='caja-comentarios'>";
        echo "<div class='card'>";
        echo "<div class='card-header'>";
        echo "$apodo";
        echo "</div>";
        echo "<div class='card-body'>";
        echo "<p class='card-text'>$descripcion</p>";

        if (isset($_SESSION["datosUser"])) {
            if ($correo == $_SESSION["datosUser"]["correo"]) {
                echo '<a href="index.php?ctl=borrarComentario&id='.$idAudio.'&idComentario='.$idComentario.'"class="btn btn-danger">Borrar Comentario</a>';
            }
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}
?>
<div id="separador-footer"></div>;