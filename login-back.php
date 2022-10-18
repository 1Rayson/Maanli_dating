<?php
    include_once("classes/MySQL.php");
    $database = new MySQL(true);

    $userNameLoginVar = $_REQUEST['userNameLogin'];
    $passwordLoginVar = $_REQUEST['passwordLogin'];

    $loginQuery = "
        SELECT userPassword
        FROM maanliUserLogin
        WHERE username = '$userNameLoginVar'
    ";

    $result = $database->Query($loginQuery)->fetch_object();

    $passVerify = password_verify($passwordLoginVar, $result->userPassword);

    if($passVerify){
        // $_SESSION['userToken'] = $result->id;
        header("location: profile.php");
        exit;
    } else {
        header("location: Login.php?login=fail");
        exit;
    }

?>