<?php
    if($_GET["ctlError"] == "falloEditar"){
        $ctl = $_GET["ctlSecundario"];
        $mensaje = "Ups.. Ha ocurrida un error al editar o no has cambiado nada de los campos de tu audio";
        $ctlVolver = "index.php?ctl=$ctl";
    }else if ($_GET["ctlError"] == "falloSubida"){
        $ctl = $_GET["ctlSecundario"];
        $mensaje = $_GET["mensaje"];
        $ctlVolver = "index.php?ctl=$ctl";
    }else if ($_GET["ctlError"] == "limite"){
        $ctl = $_GET["ctlSecundario"];
        $mensaje = "Ups.. Has superado el limite de usuario Free para subir Audios";
        $ctlVolver = "index.php?ctl=$ctl";
    }

    require_once("app/views/errores/errorGenerico.php");
?>



