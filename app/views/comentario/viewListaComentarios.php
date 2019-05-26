<?php
    foreach($model as $row){

        $correo = $row["correo"];
        $puntuacion = $row["puntuacion"];
        $descripcion = $row["descripcion"];
        $idAudio = $row["id_audio"];
        $idComentario = $row["id_comentario"];

        echo '<br>
             <div class="card">
                <div class="card-header">
                   '.$correo.'
                </div>
                <div class="card-body">
                    <h5 class="card-title">Puntuacion:'.$puntuacion.'</h5>
                    <p class="card-text">'.$descripcion.'</p>';
                    
                    if(isset($_SESSION["datosUser"])){
                        if($correo == $_SESSION["datosUser"]["correo"]){
                            echo '<a href="index.php?ctl=borrarComentario&id='.$idAudio.'&idComentario='.$idComentario.'" class="btn btn-danger">Borrar Comentario</a>';
                        }
                    }
                    
            echo '</div>
            </div>';
    }
?>