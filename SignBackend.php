<?php
    session_start();
    include("../mysql.php");
    $firstName = (isset($_REQUEST['FirstName'])) ? $_REQUEST['FirstName']: "";
    $lastName = (isset($_REQUEST['LastName'])) ? $_REQUEST['LastName']: "";
    $userName = (isset($_REQUEST['UserName'])) ? $_REQUEST['UserName']: "";
    $password = (isset($_REQUEST['password'])) ? $_REQUEST['password']: "";

    if($firstName !="" && $lastName !="" && $userName !="" && $password !=""){
        $insertSQL="INSERT INTO Users (firstName, lastName, age, gender, height, username, pw)
        VALUES
        ('$firstName', '$lastName', '$userName', '$password')";
        $mySQL->query($insertSQL); 
        header('Location: index.php?response=success');
    } else{
        header('Location: index.php?response=Failure');
    }
?>