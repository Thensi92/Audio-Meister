<?php
    if($_GET["ctlSecundario"] == "ver_frmSubida"){
    
        $ctl = $_GET["ctlSecundario"];
        $mensaje = "Ups.. Eres usuario tipo Free, no puedes subir mas audios";
        $ctlVolver = "index.php?ctl=$ctl";
    }else{
        
        if($_GET["ctlError"] == "falloEditar"){
            $ctl = $_GET["ctlSecundario"];
            $mensaje = "Ups.. Ha ocurrida un error al editar o no has cambiado nada de los campos de tu audio";
            $ctlVolver = "index.php?ctl=$ctl";
        }else if ($_GET["ctlError"] == "falloSubida"){
            $ctl = $_GET["ctlSecundario"];
            $mensaje = "Ups.. Ha ocurrido un fallo en la subida del audio";
            $ctlVolver = "index.php?ctl=$ctl";
        }
    }
    
    require_once("app/views/errores/errorGenerico.php");
?>



