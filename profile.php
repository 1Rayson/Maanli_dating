<?php
    session_start();
    include_once("classes/MySQL.php");
    $mySQL = new MySQL(true);
    $user_id = $_SESSION['userToken'];
    $profile = "SELECT firstName, lastName, age, gender, height FROM maanliUserProfile WHERE id=$user_id";
    $result = $mySQL->Query($profile)->fetch_object();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Profile - Maanli Dating</title>
</head>
<body>
    <section id="profile">
        <div id="top-bar">
            <h1>Profile</h1>
            <a><button id="logout-btn" type="button">Log Out</button></a>
        </div>

        <h2><?php echo $result->firstName; ?> <?php echo $result->lastName; ?></h2>
        <p>Age: <?php echo $result->age; ?> years old</p>
        <p>Gender: <?php echo $result->gender; ?></p>
        <p>Height: <?php echo $result->height; ?> cm</p>
        <article>
            <h2>My interests:</h2>
            <div id="interests">

            </div>
        </article>
        <article>
            <h2>Administrative actions</h2>
            <a href="update.php"><button id="update-btn" type="button">Update</button></a>
            <!--<button id="delete-btn" type="button" formaction="classes/delete.php">Delete</button>-->
        </article>
        <a href="index.php"><button id="back-to-matches-btn" type="button">Back to Matches</button></a>
    </section> 
</body>
</html>