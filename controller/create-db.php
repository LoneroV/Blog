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
            echo "<p>Successfully Created Database: . $database". "</p>";
        }
    }
    else {
        echo "<p>Database already exist.</p>";
    }
    
    
    $query = $connection->query("CREATE TABLE posts (" 
            . "id int(11) NOT NULL AUTO_INCREMENT,"
            . "title varchar(255),"
            . "post text NOT NULL,"
            . "PRIMARY KEY (id))");
    
    if($query) {
        echo "<p>Successfully created table: posts </p>";
    }
    else{
        echo "<p>$connection->error</p>";
    }
             
        
    $connection->close();