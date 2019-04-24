<?php
require "app/db/Pagination.php";
/* Config Connection */
$root = 'root';
$password = '';
$host = 'localhost';
$dbname = 'audio_meister';
$connection = new PDO("mysql:host=$host;dbname=$dbname;", $root, $password);
$pagination = new PDO_Pagination($connection);
$search = null;
    if(isset($_REQUEST["search"]) && $_REQUEST["search"] != "") {
        $search = htmlspecialchars($_REQUEST["search"]);
        $pagination->param = "&search=$search";
        $pagination->rowCount("SELECT * FROM productos WHERE titulo LIKE '%$search%' ");
        $pagination->config(5, 4);
        $sql = "SELECT * FROM productos WHERE titulo LIKE '%$search%' ORDER BY id ASC LIMIT $pagination->start_row, $pagination->max_rows";
        $query = $connection->prepare($sql);
        $query->execute();
        $model = array();
        while($rows = $query->fetch()) {
            $model[] = $rows;
        }
    }else {
        $pagination->rowCount("SELECT * FROM productos");
        $pagination->config(5, 4);
        $sql = "SELECT * FROM productos ORDER BY id ASC LIMIT $pagination->start_row, $pagination->max_rows";
        $query = $connection->prepare($sql);
        $query->execute();
        $model = array();
        
        while($rows = $query->fetch()) {
            $model[] = $rows;
        }
    }
?>