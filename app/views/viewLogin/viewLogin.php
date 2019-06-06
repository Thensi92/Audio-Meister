<?php
if (isset($_SESSION['datosUser'])) {
    header("location: index.php");
}
require_once("web/html/includes/forms/login.inc");

?>