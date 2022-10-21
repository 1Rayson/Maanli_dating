<?php
session_start();
include("classes/mySQL.php");
$database = new MySQL(true);

if(isset($_GET['logout']) && $_GET['logout'] == "true" ){
    $_SESSION['userToken'] = NULL;
    header('location: Login.php');
}

?>