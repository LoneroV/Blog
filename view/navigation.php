<?php
    require_once(__DIR__ . "/../model/config.php");
    require_once(__DIR__ . "/../controller/login-verify.php");
    
    if(!authenticateUser()) {
        header("location: " . $path . "index.php");
        die();
    }
?>
<nav>
    <ul>
        <li>
            <a href="<?php echo $path . "post.php"?>">Blog Post Form</a> <br />
            <a href="<?php echo $path . "logout-user.php"?>">Logout</a> 
        </li>
    </ul>
</nav>
