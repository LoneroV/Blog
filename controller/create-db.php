<?php
    require_once(__DIR__ . "/../model/database.php");

    $connection = new mysqli ($host, $username, $password);

    if($connection->connect_error) {
        die("Error: " .$connection->connect_error );
    }
    
    $exists = $connection->select_db($database);
    
    if(!$exists){
        $query = $connection->query("CREATE DATABASE $database");
        
        if($query){
            echo "Successfully Created Database: . $database";
        }
    }
    else {
        echo "Database already exist";
    }
    
    
    $query = $connection->query("CREATE TABLE posts (" 
            . "id int(11) NOT NULL AUTO-INCREMENT,"
            . "title varchat(255)");
    
        
    $connection->close();