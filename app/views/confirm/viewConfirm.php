<div id="mensajeError">
    <div class="card">
        <div class="card-body">
           <?php 
                echo "$mensaje"; 
            ?>
        </div>
            <?php 
                echo '<a id="botonError" class="btn btn-primary" href=" '.$ctlBorrar.' ">Aceptar</a>
                  <a id="botonError" href=" '.$ctlVolver.' " class="btn btn-warning">Volver</a>'; 
             ?>
    </div>
</div>
