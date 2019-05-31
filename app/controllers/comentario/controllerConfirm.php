<?php
    if($_GET["ctlSecundario"] == "eliminarUserAdmin"){
        
        $ctl = $_GET["ctlSecundario"];
        $correo = $_GET["correo"];
        $mensaje = "¿Seguro que quieres borrar el usuario?";
        $ctlVolver = "index.php?ctl=listarAllUser";
        $ctlBorrar = "index.php?ctl=$ctl&correo=$correo";

    }else if($_GET["ctlSecundario"] == "eliminarAudioAdmin"){

        $ctl = $_GET["ctlSecundario"];
        $id = $_GET["id"];
        $ruta = $_GET["ruta"];
        $correo = $_GET["correo"];
        $mensaje = "¿Seguro que quieres borrar el audio?";
        $ctlVolver = "index.php?ctl=listarAllAudios";
        $ctlBorrar = "index.php?ctl=$ctl&id=$id&correo=$correo&ruta=$ruta";

    }else if($_GET["ctlSecundario"] == "eliminarAudio"){
        $ctl = $_GET["ctlSecundario"];
        $mensaje = "¿Seguro que quieres borrar el audio?";
        $ctlVolver = "index.php?ctl=verOwnAudios";
        $ctlBorrar ="index.php?ctl=$ctl";
    
    }else if($_GET["ctlSecundario"] == "borrarComentario"){
        $ctl = $_GET["ctlSecundario"];
        $id = $_GET["id"];
        $idComentario = $_GET["idComentario"];
        $mensaje = "¿Seguro que quieres borrar el comentario?";
        $ctlVolver = "index.php?ctl=verComentarios&id=$id";
        $ctlBorrar = "index.php?ctl=$ctl&id=$id&idComentario=$idComentario";
    }
    
    require_once("app/views/confirm/viewConfirm.php");
?>



