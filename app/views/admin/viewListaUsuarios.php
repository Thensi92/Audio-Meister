<section>
    <?php
        echo '<ul class="list-group">';
            foreach($model as $row)
            {
                //Codificacion de los datos
                $correo = base64_encode($row['correo']);

                //Poner index.php?ctl=eliminar
                echo '<li class="list-group-item list-group-item-info">'.$row['correo'].'<br><a class="btn btn-danger" href="index.php?ctl=eliminarUserAdmin&correo='.$correo.'" role="button">Borrar</a></li>';
            }
        echo '</ul>';
    ?>
</section>