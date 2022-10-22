<?php
    session_start();
    
    if(isset($_SESSION['userToken'])) header("location: index.php");

    $fail = false;
    $response = isset($_GET['login']) ? $_GET['login'] : "";

    if($response == "fail") $fail = true;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
  <link rel="icon" type="image/x-icon" href="/img/favicon.png">
    <link rel="stylesheet" href="style.css">
    <title>Login - Maanli Dating</title>
</head>
    <body id="login-body">
        <section id="login-section">
            <form action="backend.php?action=login" method="post" id="login-form">
                <?php 
                    if($fail)echo "<p id='log-in-fail-text'>Your password or username is wrong</p>";
                ?>
                <label>
                    <p>Username</p>
                    <input type="text" name="userNameLogin" id="login-username">
                </label>
                <label>
                    <p>Password</p>    
                    <input type="password" name="passwordLogin" id="login-password">
                </label>
                <input type="submit" value="Log In">
            </form>
        <p>New to this site?<a href="sign_up.php">New to this site? Create a user!</a></p>
        </section>
    </body>
</html>