<?php
    session_start();
    include_once("classes/MySQL.php");
    $database = new MySQL(true);
    if(!isset($_SESSION['userToken'])) $_SESSION['userToken'] = 0;

    $userNameLoginVar = $_REQUEST['userNameLogin'];
    $passwordLoginVar = $_REQUEST['passwordLogin'];

    $loginQuery = "
        SELECT id, userPassword
        FROM maanliUserLogin
        WHERE username = '$userNameLoginVar'
    ";

    $result = $database->Query($loginQuery)->fetch_object();

    $passVerify = password_verify($passwordLoginVar, $result->userPassword);

    if($passVerify){
        $_SESSION['userToken'] = $result->id;
        header("location: index.php");
        exit;
    } else {
        header("location: Login.php?login=fail");
        exit;
    }

?>