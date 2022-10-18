<?php
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
    <section>
        <h2 id="firstName"></h2>
        <p id="lastName"></p>
        <p id="age"></p>
        <p id="gender"></p>
        <p id="height"></p>
    </section>
    <section>
        <h2>Administrative actions</h2>
        <!-- ONCLICK FUNCTIONS ARE THE WRONG ONES-->
        <button id="update-btn" type="button" onclick="callAPI()">Update</button>
        <button id="delete-btn" type="button" onclick="callAPI()">Delete</button>
    </section>
    <script>
        async function callAPI(endpoint, accessLevel) {
            let response = await fetch("backend.php?action=" + endpoint + "&access=" + accessLevel);
            let data = await response.text();

            let outputDOM = document.querySelector("#output");
            outputDOM.innerHTML = data;
        }
    </script>    
</body>
</html>