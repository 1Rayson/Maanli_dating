<?php
    session_start();

    
    if($_GET['nextMatch']){
        $_SESSION['match']++;
        header("location: index.php");
    }


?>