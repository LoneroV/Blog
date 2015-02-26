<?php
    require_once(__DIR__ . "/../model/config.php");
    //these strings make it so you know when you mess up entering in their username or password
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    
    $salt = "$5$" . "rounds=500$" . uniqid(mt_rand(), true) . "$";
    
    $hashedPassword = crypt($password, $salt);
    //This allows me to create my user using email password and username
    $query = $_SESSION["connection"]->query("INSERT INTO users SET "
            . "email = '$email',"
            . "username = '$username',"
            . "password = '$hashedPassword',"
            . "salt = '$salt'");
    
    
    if($query) {
        echo "Successsfully created user: $username";
        //allows us to see the  link in the nav bar
        ?><a href="<?php echo $path . "index.php"?>">Create User</a><?php
    }
    else{
        echo "<p>" . $_SESSION["connection"]->error . "</p>";
    }