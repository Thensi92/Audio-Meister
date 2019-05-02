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
        $pagination->rowCount("SELECT * FROM audios WHERE nombre_audio LIKE '%$search%' ");
        $pagination->config(5, 4);
        $sql = "SELECT * FROM audios WHERE nombre_audio LIKE '%$search%' ORDER BY fecha_subida ASC LIMIT $pagination->start_row, $pagination->max_rows";
        $query = $connection->prepare($sql);
        $query->execute();
        $model = array();
        while($rows = $query->fetch()) {
            $model[] = $rows;
        }
    }else {
        $pagination->rowCount("SELECT * FROM audios");
        $pagination->config(5, 4);
        $sql = "SELECT * FROM audios ORDER BY fecha_subida ASC LIMIT $pagination->start_row, $pagination->max_rows";
        $query = $connection->prepare($sql);
        $query->execute();
        $model = array();
        
        while($rows = $query->fetch()) {
            $model[] = $rows;
        }
    }
?>