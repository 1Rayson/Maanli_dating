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
    <title>Profile - Maanli Dating</title>
</head>
<body>
    <h1>Profile</h1>
    <section id="profile">
        <h2><?php echo $result->firstName; ?></h2>
        <p><?php echo $result->lastName; ?></p>
        <p>Age: <?php echo $result->age; ?> years old</p>
        <p>Gender: <?php echo $result->gender; ?></p>
        <p>Height: <?php echo $result->height; ?> cm</p>
    </section>
    <section>
        <h2>Administrative actions</h2>
        <!-- ONCLICK FUNCTIONS ARE THE WRONG ONES-->
        <button id="update-btn" type="button">Update</button>
        <button id="delete-btn" type="button">Delete</button>
    </section>
    <script>

        //onclick="callAPI()"
        /*async function callAPI(endpoint) {
            let response = await fetch("backend.php?action=" + endpoint);
            let data = await response.text();

            let outputDOM = document.querySelector("#profile");
            outputDOM.innerHTML = data;
        }*/

    </script>    
</body>
</html>