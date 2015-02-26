<?php
    require_once(__DIR__ . "/../model/config.php");

    $connection = new mysqli($host, $username, $password, $database);

    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
    $post = filter_input(INPUT_POST, "post", FILTER_SANITIZE_STRING);

    $query = $connection->query("INSERT INTO posts SET title = '$title', post = '$post'");

    if($query){
        echo "<p>Successfully inserted post: $title</p>";
        //allows us to see the  link in the nav bar
        ?><a href="<?php echo $path . "index.php"?>">Create a Post</a><?php
    }
    else
        {
        //tells you that you have an error
        echo "<p>$connection->error</p>";
}
