<?php
    include('/classes/MySQL.php');
    session_start();
    $mySQL = new MySQL(true);

    $user_check = $_SESSION['login_user'];
    $ses_sql = mysqli_query(Connect(),"SELECT username, id from maanliUserLogin where username='$user_check'");
    $ses_row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
    $loggedin_session = $ses_row['username'];
    $loggedin_id = $ses_row['id'];
    if(!isset($loggedin_session) || $loggedin_session == NULL) {
        echo "Go back";
        header("Location: index.php");
    }
?>