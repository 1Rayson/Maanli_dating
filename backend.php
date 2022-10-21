<?php
session_start();
include("classes/mySQL.php");
$database = new MySQL(true);


// 
// Logout button
// 
if(isset($_GET['logout']) && $_GET['logout'] == "true" ){
    $_SESSION['userToken'] = NULL;
    header('location: Login.php');
}

// 
// Sign up back end
// 

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
    $interests =[];
    
    if($_REQUEST['interest1'] != "none")$interests[] = $_REQUEST['interest1'];
    if($_REQUEST['interest2'] != "none") $interests[] = $_REQUEST['interest2'];
    if($_REQUEST['interest3'] != "none") $interests[] = $_REQUEST['interest3'];

    if($firstName !="" && $lastName !="" && $age !="" && $gender !="" && $height !="" && $younger !="" && $older !="" && $pGender !="" && $userName !="" && $password !="" ){

        $passEncrypt = password_hash($password, PASSWORD_DEFAULT);
        $userSQL = "CALL InsertMaanliUserData('$firstName', '$lastName','$age', '$gender', '$height', '$younger', '$older', '$pGender', '$userName', '$passEncrypt' );";    
        $database->Query($userSQL);

        $loginQuery = "
            SELECT id
            FROM maanliUserLogin
            WHERE username = '$userName'
        ";
        $result = $database->Query($loginQuery)->fetch_object();

        for($i=0; $i < sizeof($interests); $i++){
            $interest = $interests[$i];
            $interestQuery = "
                INSERT INTO maanliUserInterests
                    (interestName, userID)
                VALUES
                    ('$interest', '$result->id')
            ";
        }
        
        header("location: login.php");
    } else {
        header("location: sign_up.php?signup=fail");
    }

// 
// Login Backend
// 


// 
// Update Backend
// 
    if (isset($_SESSION['userToken'])) {
        $user_id = $_SESSION['userToken'];
        $firstName = (isset($_REQUEST['firstName'])) ? $_REQUEST['firstName']: "";
        $lastName = (isset($_REQUEST['lastName'])) ? $_REQUEST['lastName']: "";
        $age = (isset($_REQUEST['age'])) ? $_REQUEST['age']: "";
        $gender = (isset($_REQUEST['gender'])) ? $_REQUEST['gender']: "";
        $height = (isset($_REQUEST['height'])) ? $_REQUEST['height']: "";
        $username = (isset($_REQUEST['username'])) ? $_REQUEST['username']: "";
        $password = (isset($_REQUEST['userPassword'])) ? $_REQUEST['userPassword']: "";
    }

    if($firstName !="" && $lastName !="" && $age !="" && $gender !="" && $height !="" && $username !="" && $password !=""){
        $passEncrypt = password_hash($password, PASSWORD_DEFAULT);
        $userSQL = "CALL UpdateMaanliUserData('$user_id', '$firstName', '$lastName','$age', '$gender', '$height', '$username', '$passEncrypt');";    
        $mySQL->Query($userSQL);
        header("location: ../profile.php");
    }

// 
// Index backend
// 

?>