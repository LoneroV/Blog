<?php
    require_once(__DIR__ . "/../model/database.php");

    $connection = new mysqli ($host, $username, $password);

    if($connection->connect_error) {
        die("Error: " .$connection->connect_error );
    }
    else {
        echo "Success: " . $connection->host_info;
    }
    
    $exists = $connection->select_db($database);
    
    
    
    $connection->close();