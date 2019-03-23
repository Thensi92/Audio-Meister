<?php
    session_name('user');
    session_start();

    /**
     * CREAR ARRAYs PARA INSTANCIAR LOS DIFF CONTROLADORES
     */

    //LINKS
    require_once("web/html/head/links/links.php");

    //HEADER
    require_once("web/html/body/header/header.php");
    
    //NAVBAR
        if(empty($_SESSION['datosUser'])){
            require_once("web/html/body/navbar/defaultNavBar.php");
        }else{
            if($_SESSION['datosUser'][5] == "user"){
                require_once("web/html/body/navbar/navBarUser.php");
            }else{
                require_once("web/html/body/navbar/navBarAdm.php");
            }
        }

    //SECTION -> DESCOMENTAR BUCLE CUANDO ESTEN LOS CONTROLADORES
    echo "<section>";
        echo "<h1> HOLA MUNDO </h1>";
        echo "<h2> ESTO ES UN SECTION DE PRUEBA </h2>";
    echo "</section>";
    /*   
        if(isset($_GET['ctl'])){
            foreach($arrayGET as $control => $URI){
                if($_GET['ctl'] == $control){
                    require_once($URI);
                }
            }
        }else{
            require_once("app/views/audios/audios.php");
        }
    */
    
    //FOOTER
        require_once("web/html/body/footer/footer.php");

    ?>
