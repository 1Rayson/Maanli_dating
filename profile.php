<?php
    session_start();
    include_once ("/classes/MySQL.php");
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
        <h2><?php echo $first_name ?></h2>
        <p><?php echo $last_name ?></p>
        <p><?php echo $age ?></p>
        <p><?php echo $gender ?></p>
        <p><?php echo $height ?></p>
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