<?php
    session_start();

    
    if($_GET['nextMatch']){
        $_SESSION['matchArrayId']++;
        header("location: index.php");
    }


?>