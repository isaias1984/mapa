<?php 
    $conn = new mysqli('localhost', 'root', '', 'cactus');
    $conn->set_charset("utf8");

    if ($conn->connect_error) {
        echo $error -> $conn->connect_error;
    } 
?>