<?php

require_once('app/controllers/productos/busquedaProductos.php');

?>


<section>

    <div id="contenedor">
        <div class="card" style="width: 18rem;">
            <img src="web/html/body/img/i.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card 1</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img src="web/html/body/img/i.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card 2</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>

    <?php
    echo "<center>";
        echo "<div>";
            $pagination->pages("btn btn-primary");
        echo "</div>";
    echo "</center>";
    ?>

</section>