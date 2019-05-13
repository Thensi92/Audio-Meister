<section>
    <?php
        foreach($model as $row)
        {
            echo "
                <div class=\"card\" style=\"width: 12rem;\">
                    <img src=\" ".$row['ruta_imagen_audio']." \" class=\"card-img-top\">
                        <div class=\"card-body\" height:5rem; bg-success >
                            <h5 class=\"card-title\">".$row['nombre_audio']."</h5>
                            <a href=\"index.php?ctl=frmEditar&tipoOperacion=editar&id=".$row['id_audio']."\" class=\"btn-primary btn-sm\">Editar</a>
                        </div>
                </div>";
        }
    
    ?>
    <div>
        <?php
    $pagination->pages("btn");
    ?>
    </div>
</section>