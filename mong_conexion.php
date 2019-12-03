<?php

function getDataBase() {

    $host = "127.0.0.1";
    $port = "27017";
    $user = rawurlencode("isaias");
    $pass = rawurlencode("prueba");
    $dbName = "cactus";

    # Like that: mongodb.//admin:pass1234@127.0.0.1:27017/cactus
    $conStr = sprintf("mongodb://%s:%s@%s:%s/%s", $user, $pass, $host, $port, $dbName);

    $client = new MongoDB\Client($conStr);

    return $client->selectDatabase($dbName);
}
?>