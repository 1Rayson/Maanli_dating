<?php
    session_start();
    include("classes/mySQL.php");
    if(!isset($_SESSION['userToken'])) $_SESSION['userToken'] = NULL;
    $database = new MySQL(true);

    $firstName = (isset($_REQUEST['firstName'])) ? $_REQUEST['firstName']: "";
    $lastName = (isset($_REQUEST['lastName'])) ? $_REQUEST['lastName']: "";
    $age = (isset($_REQUEST['age'])) ? $_REQUEST['age']: "";
    $gender = (isset($_REQUEST['gender'])) ? $_REQUEST['gender']: "";
    $height = (isset($_REQUEST['height'])) ? $_REQUEST['height']: "";
    $younger = (isset($_REQUEST['younger'])) ? $_REQUEST['younger']: "";
    $older = (isset($_REQUEST['older'])) ? $_REQUEST['older']: "";
    $pGender = (isset($_REQUEST['prefer_gender'])) ? $_REQUEST['prefer_gender']: "";
    $userName = (isset($_REQUEST['userName'])) ? $_REQUEST['userName']: "";
    $password = (isset($_REQUEST['password'])) ? $_REQUEST['password']: "";
    
    /* $inter1 = (isset($_REQUEST['interest1'])) ? $_REQUEST['interest1']: "";
    $inter2 = (isset($_REQUEST['interest2'])) ? $_REQUEST['interest2']: "";
    $inter3 = (isset($_REQUEST['interest3'])) ? $_REQUEST['interest3']: ""; */
    
    if($firstName !="" && $lastName !="" && $age !="" && $gender !="" && $height !="" && $younger !="" && $older !="" && $pGender !="" && $userName !="" && $password !="" ){
        $passEncrypt = password_hash($password, PASSWORD_DEFAULT);
        $userSQL = "CALL InsertMaanliUserData('$firstName', '$lastName','$age', '$gender', '$height', '$younger', '$older', '$pGender', '$userName', '$passEncrypt' );";    
        $database->Query($userSQL);
        header("location: profile.php");
    } else {
        header("location: sign_up.php?signup=fail");
    }
?>