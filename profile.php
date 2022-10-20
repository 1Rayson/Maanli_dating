<?php
    session_start();
    include("profileBackend.php");

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
    <link rel="stylesheet" href="profile_style.css">
    <title>Profile - Maanli Dating</title>
</head>
<body>
    <section id="profile">
        <h1>Profile</h1>
        <h2><?php echo $result->firstName; ?> <?php echo $result->lastName; ?></h2>
        <p>Age: <?php echo $result->age; ?> years old</p>
        <p>Gender: <?php echo $result->gender; ?></p>
        <p>Height: <?php echo $result->height; ?> cm</p>
        <article>
            <h2>My interests:</h2>
            <p>Interest 1</p>
            <p>Interest 2</p>
            <p>Interest 3</p>
        </article>
        <article>
        <h2>Administrative actions</h2>
        <!-- ONCLICK FUNCTIONS ARE THE WRONG ONES-->
        <button id="update-btn" type="button" onclick="updateUser(user_id)">Update</button>
        <button id="delete-btn" type="button"onclick="deleteUser(user_id)">Delete</button>
    </article>
    </section> 
</body>
</html>