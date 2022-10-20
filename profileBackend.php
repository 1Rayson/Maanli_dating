<?php
include_once("classes/MySQL.php");
    $mySQL = new MySQL(true);

    // Variables used to check what action has been requested and what access level is allowed 
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";
    $accessLevel = isset($_REQUEST['access']) ? $_REQUEST['access'] : 0;

    if (isset($_SESSION['userToken'])) {
        $user_id = $_SESSION['userToken'];
        $first_name = "SELECT firstName FROM maanliUserProfile WHERE id=$user_id";
        $last_name = "SELECT lastName FROM maanliUserProfile WHERE id=$user_id";
        $age = "SELECT age FROM maanliUserProfile WHERE id=$user_id";
        $gender = "SELECT gender FROM maanliUserProfile WHERE id=$user_id";
        $height = "SELECT height FROM maanliUserProfile WHERE id=$user_id";
    }

?>