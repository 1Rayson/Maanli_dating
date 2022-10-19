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
        <h2><?php echo $rows['firstName'] ?></h2>
        <p><?php echo $rows['lastName'] ?></p>
        <p><?php echo $rows['age'] ?></p>
        <p><?php echo $rows['gender'] ?></p>
        <p><?php echo $rows['height'] ?></p>
        <p><?php echo $rows['id'] ?></p>


            <table>
            <tr id="lg-1">
            <td class="tl-1"> <div align="left" id="tb-name">Reg id:</div> </td>
            <td class="tl-4"><?php echo $rows['mem_id']; ?></td>
            </tr>
            <tr id="lg-1">
            <td class="tl-1"><div align="left" id="tb-name">Username:</div></td>
            <td class="tl-4"><?php echo $rows['username']; ?></td>
            </tr>
            <tr id="lg-1">
            <td class="tl-1"><div align="left" id="tb-name">Name:</div></td>
            <td class="tl-4"><?php echo $rows['fname']; ?> <?php echo $rows['lname']; ?></td>
            </tr>
            <tr id="lg-1">
            <td class="tl-1"><div align="left" id="tb-name">Email id:</div></td>
            <td class="tl-4"><?php echo $rows['address']; ?></td>
            </tr>
        </table>
    </section>
    <section>
        <h2>Administrative actions</h2>
        <!-- ONCLICK FUNCTIONS ARE THE WRONG ONES-->
        <button id="update-btn" type="button" onclick="callAPI()">Update</button>
        <button id="delete-btn" type="button" onclick="callAPI()">Delete</button>
    </section>
    <script>
        async function callAPI(endpoint) {
            let response = await fetch("backend.php?action=" + endpoint);
            let data = await response.text();

            let outputDOM = document.querySelector("#profile");
            outputDOM.innerHTML = data;
        }

    </script>    
</body>
</html>