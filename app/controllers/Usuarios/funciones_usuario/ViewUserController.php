<?php

    if(!empty($_SESSION['datosUser'])){
        require_once("app/views/usuario/ViewUser.view");
    }else{
        header("Location:index.php");
    }
    
?>