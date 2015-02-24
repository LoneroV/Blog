<?php
    require_once(__DIR__ . "/../model/config.php");
    
    $email = filter_input(FILTER_POST, "email", FILTER_SANITIZE_EMAIL);
    $username = filter_input(FILTER_POST, "username", FILTER_SANITIZE_STRING);
    $password = filter_input(FILTER_POST, "password", FILTER_SANITIZE_STRING);
    
    echo $password;
    
    $salt = "$5$" . "rounds=500$" . uniqid(mt_rand(), true) . "$";
    
    $hashedPassword = crypt($password, $salt);
    
    $query = $_SESSION["connection"]->query("INSERT INTO users SETS "
            . "email = '$email',"
            . "username = '$username',"
            . "password = '$hashedPassword',"
            . "salt = '$salt'");
    
    if($query){
        echo "Successfully created user: $username";
    }
    else {
        echo "<p>" . $_SESSION["connection"]->error . "</p>";
    }
    