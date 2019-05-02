<?php
    session_name('user');
    session_start();

    require_once("web/html/includes/arrayGET/arrayGET.php");
    require_once("web/html/includes/arrayPOST/arrayPOST.php");

    //LINKS
    require_once("web/html/head/links/links.php");

    //HEADER
    require_once("web/html/body/header/header.php");
    
    //NAVBAR
        if(empty($_SESSION['datosUser'])){
            require_once("web/html/body/navbar/defaultNavBar.php");
        }else{
            if($_SESSION['datosUser']['rol'] == "user"){
                require_once("web/html/body/navbar/navBarUser.php");
            }else{
                require_once("web/html/body/navbar/navBarAdm.php");
            }
        }

    //SECTION -> DESCOMENTAR BUCLE CUANDO ESTEN LOS CONTROLADORES

        if(isset($_GET['ctl'])){
            foreach($arrayGET as $control => $URI){
                if($_GET['ctl'] == $control){
                    require_once($URI);
                }
            }
        }else{
            require_once("app/views/defaultView/indexView.php");
        }
    
    //FOOTER
        require_once("web/html/body/footer/footer.php");

    ?>
