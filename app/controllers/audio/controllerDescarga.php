<?php
    $url= $_GET["url"];
    $nombre=basename($url);
    header("Content-disposition:attachment; filename=$nombre ");
    header("Content-type: audio/mpeg3");
    readfile($url);
?>