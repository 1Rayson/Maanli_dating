<?php
include_once("classes/MySQL.php");
    $mySQL = new MySQL(true);

    //////// Profile ////////

    // If a session is ongoing, select every
    /*if (isset($_SESSION['userToken'])) {
        $user_id = $_SESSION['userToken'];
        $first_name = "SELECT firstName FROM maanliUserProfile WHERE id=$user_id";
        $last_name = "SELECT lastName FROM maanliUserProfile WHERE id=$user_id";
        $age = "SELECT age FROM maanliUserProfile WHERE id=$user_id";
        $gender = "SELECT gender FROM maanliUserProfile WHERE id=$user_id";
        $height = "SELECT height FROM maanliUserProfile WHERE id=$user_id";
    }*/

    // Delete

    /*async function deleteUser(userID) {

    }*/
?>