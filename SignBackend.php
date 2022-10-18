<?php
    session_start();
    include("classes/mySQL.php");
    $database = new MySQL(true);

    $firstName = (isset($_REQUEST['firstName'])) ? $_REQUEST['firstName']: "";
    $lastName = (isset($_REQUEST['lastName'])) ? $_REQUEST['lastName']: "";
    $age = (isset($_REQUEST['age'])) ? $_REQUEST['age']: "";
    $gender = (isset($_REQUEST['gender'])) ? $_REQUEST['gender']: "";
    $height = (isset($_REQUEST['height'])) ? $_REQUEST['height']: "";
    $userName = (isset($_REQUEST['userName'])) ? $_REQUEST['userName']: "";
    $password = (isset($_REQUEST['password'])) ? $_REQUEST['password']: "";

    if($firstName !="" && $lastName !="" && $age !="" && $gender !="" && $height !="" && $userName !="" && $password !=""){
        $passEncrypt = password_hash($password, PASSWORD_DEFAULT);
        $userSQL = "CALL InsertMaanliUserData('$firstName', '$lastName','$age', '$gender', '$height', '$userName', '$passEncrypt');";    
        $database->Query($userSQL);
        echo "succes";
    } else{
        echo "fail";
    }
?>