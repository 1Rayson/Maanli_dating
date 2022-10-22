<?php
session_start();
include("classes/mySQL.php");
// 
// Variables
// 
$database = new MySQL(true);
$action = $_GET['action'] ;

// 
// Logout button
// 
if(isset($_GET['logout']) && $_GET['logout'] == "true" ){
    $_SESSION['userToken'] = NULL;
    header('location: Login.php');
    exit;
}

// 
// Sign up back end
// 

if($action == 'signup'){
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
            $database->Query($interestQuery);
        }
        
        header("location: login.php");
    } else {
        header("location: sign_up.php?signup=fail");
    }
}
// 
// Login Backend
// 
if($action == 'login') {
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
}
// 
// Update Backend
// 
if($action == 'update') {
        $user_id = $_SESSION['userToken'];
        $firstName = (isset($_REQUEST['firstName'])) ? $_REQUEST['firstName']: "";
        $lastName = (isset($_REQUEST['lastName'])) ? $_REQUEST['lastName']: "";
        $age = (isset($_REQUEST['age'])) ? $_REQUEST['age']: "";
        $gender = (isset($_REQUEST['gender'])) ? $_REQUEST['gender']: "";
        $height = (isset($_REQUEST['height'])) ? $_REQUEST['height']: "";
        $username = (isset($_REQUEST['username'])) ? $_REQUEST['username']: "";
        $password = (isset($_REQUEST['userPassword'])) ? $_REQUEST['userPassword']: "";
        $preferedGender = (isset($_REQUEST['prefer_gender'])) ? $_REQUEST['prefer_gender']: "";
        $minAge = (isset($_REQUEST['younger'])) ? $_REQUEST['younger']: "";
        $maxAge = (isset($_REQUEST['older'])) ? $_REQUEST['older']: "";
        $interests =[];
    
        if($_REQUEST['interest1'] != "none")$interests[] = $_REQUEST['interest1'];
        if($_REQUEST['interest2'] != "none") $interests[] = $_REQUEST['interest2'];
        if($_REQUEST['interest3'] != "none") $interests[] = $_REQUEST['interest3'];
    
        if($firstName !="" && $lastName !="" && $age !="" && $gender !="" && $height !="" && $minAge !="" && $maxAge !="" && $preferedGender !="" && $username !="" && $password !="" ){
    
            $passEncrypt = password_hash($password, PASSWORD_DEFAULT);
            $userSQL = "CALL UpdateMaanliUserData('$firstName', '$lastName','$age', '$gender', '$height', '$minAge', '$maxAge', '$preferedGender', '$username', '$passEncrypt' );";    
            $database->Query($userSQL);

            $deleteInterestQuery = "
                DELETE FROM maanliUserInterests
                WHERE userID = '$user_id'
            ";
            $database->Query($deleteInterestQuery);
    
            for($i=0; $i < sizeof($interests); $i++){
                $interest = $interests[$i];
                $interestQuery = "
                    INSERT INTO maanliUserInterests
                        (interestName, userID)
                    VALUES
                        ('$interest', $user_id)
                ";
                $database->Query($interestQuery);
            }

        header("location: profile.php");
    } else {
        header("location: update.php?fail=update");
    }
}
// 
// Index backend
// 
    if($_GET['nextMatch']){
        $_SESSION['matchArrayId']++;
        header("location: index.php");
    }

?>