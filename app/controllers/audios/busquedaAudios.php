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
    //BUSCADOR
    if(isset($_REQUEST["search"]) && $_REQUEST["search"] != "") {
        $search = htmlspecialchars($_REQUEST["search"]);

        $pagination->param = "&search=$search";
        $pagination->rowCount("SELECT * FROM audios WHERE nombre_audio LIKE '%$search%' AND visibilidad = 1 ");
        $pagination->config(2, 16);

        $sql = "SELECT * FROM audios WHERE nombre_audio LIKE '%$search%' AND visibilidad = 1 ORDER BY fecha_subida ASC LIMIT $pagination->start_row, $pagination->max_rows";
        $query = $connection->prepare($sql);
        $query->execute();

        $model = array();

        while($rows = $query->fetch()) {
            $model[] = $rows;
        }
    }else {
        //INDEX
        $pagination->rowCount("SELECT * FROM audios");
        $pagination->config(2, 8);
        
        $sql = "SELECT * FROM audios WHERE visibilidad = 1 ORDER BY fecha_subida ASC LIMIT $pagination->start_row, $pagination->max_rows";
        $query = $connection->prepare($sql);
        $query->execute();
        $model = array();
        
        while($rows = $query->fetch()) {
            $model[] = $rows;
        }
    }
?>