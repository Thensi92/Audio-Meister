<?php

if(isset($_SESSION['datosUser'])){
    session_destroy();
    header("Location:index.php");
}

?>