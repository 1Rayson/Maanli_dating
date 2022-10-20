<?php
include_once("classes/MySQL.php");
    $mySQL = new MySQL(true);

    // Variables used to check what action has been requested and what access level is allowed 
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";
    $accessLevel = isset($_REQUEST['access']) ? $_REQUEST['access'] : 0;

    /*if($action == "userlist") {
        // Check if the user has ADMIN access (1 = user, 5 = admin)
        if($accessLevel == 5) {
            $sql = "SELECT display_name, profile_text, profile_active, access_level, creation_time FROM userprofile ORDER BY id ASC";
        } else {
            $sql = "SELECT display_name, profile_text FROM userprofile ORDER BY id ASC";
        }

        // Return the SQL response to the frontend as JSON
        echo $mySQL->Query($sql, true);
    }

    if($action == "newest") {
        // Check if the user has ADMIN access (1 = user, 5 = admin)
        if($accessLevel == 5) {
            $sql = "SELECT display_name, profile_text, profile_active, access_level, creation_time FROM userprofile ORDER BY id DESC LIMIT 5";
        } else {
            $sql = "SELECT display_name, profile_text FROM userprofile ORDER BY id DESC LIMIT 5";
        }

        // Return the SQL response to the frontend as JSON
        echo $mySQL->Query($sql, true);
    }

    /*if($action == "profileInfo") {
        if (isset($_SESSION['login_user'])) {

        $sql = "SELECT firstName, lastName, age, gender, height FROM maanliUserProfile WHERE id=$loggedin_id"
        }
    }*/



    if (isset($_SESSION['login_user'])) {
        $user_id = $_SESSION['login_user'];
        $first_name = "SELECT firstName FROM maanliUserProfile WHERE id=$user_id";
        $last_name = "SELECT lastName FROM maanliUserProfile WHERE id=$user_id";
        $age = "SELECT age FROM maanliUserProfile WHERE id=$user_id";
        $gender = "SELECT gender FROM maanliUserProfile WHERE id=$user_id";
        $height = "SELECT height FROM maanliUserProfile WHERE id=$user_id";
    }



    /*session_start();
    $user_check = $_SESSION['login_user'];
    $con = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);
    $user_sql = mysqli_query($con,"SELECT username, id from maanliUserProfile where id='$user_check'");
    $user_row = mysqli_fetch_array($user_sql, MYSQLI_ASSOC);
    $loggedin_session = $ses_row['username'];
    $loggedin_id = $ses_row['id'];
    if(!isset($loggedin_session) || $loggedin_session == NULL) {
        echo "Go back";
        header("Location: index.php");
    }

    if($action == "userlist") {
        // Check if the user has ADMIN access (1 = user, 5 = admin)
        if($accessLevel == 5) {
            $sql = "SELECT display_name, profile_text, profile_active, access_level, creation_time FROM userprofile ORDER BY id ASC";
        } else {
            $sql = "SELECT * from maanliUserProfile where id='$loggedin_id'"
        }

        // Return the SQL response to the frontend as JSON
        echo $mySQL->Query($sql, true);
    }

    $sql = "SELECT * from maanliUserProfile where id='$loggedin_id'";*/

?>