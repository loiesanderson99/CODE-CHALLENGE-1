<?php

    $server = "localhost:3307";
    $username = "root";
    $password = "";
    $database = "database";

    $conn = new mysqli($server, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed : " . $conn->connect_error);
    }
    
?>