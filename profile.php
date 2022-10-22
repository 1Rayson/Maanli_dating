<?php
    session_start();
    if(!isset($_SESSION['userToken'])) header("location: Login.php");
    
    include_once("classes/MySQL.php");
    $mySQL = new MySQL(true);
    $user_id = $_SESSION['userToken'];
    $profile = "SELECT firstName, lastName, age, gender, height FROM maanliUserProfile WHERE id=$user_id";
    $interests = "SELECT interestName FROM maanliUserInterests WHERE userID=$user_id";
    $profile_result = $mySQL->Query($profile)->fetch_object();
    $interests_result = $mySQL->Query($interests);
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
    <article id="profile-btn-article">
        <a id="index-button" href="index.php">< Matches</a>
    </article>
    <wrapper class="wrapper">
        <section class="info">
            <a href="backend.php?logout=true" id="logout-btn">Log Out</a>
            <p class="description-tag">About</p>
            <article>
                <div class="name_div">
                    <h2 id="first_name"><?php echo $profile_result->firstName; ?></h2>
                    <h3 id="last_name"> <?php echo $profile_result->lastName; ?></h3>
                </div>    
                <div class="details">
                    <p id="age"><?php echo $profile_result->age; ?></p>
                    <p class="divider">|</p>
                    <p id="gender"><?php echo $profile_result->gender; ?></p>
                    <p class="divider">|</p>
                    <p id="height"><?php echo $profile_result->height; ?> cm</p>
                </div>
            </article>
            
            <p class="description-tag">Interests</p>
            <article class="interests">
                <?php

                $InterestList = [];
                while($row = $interests_result->fetch_object()) {
                    $InterestList[] = $row->interestName;
                }

                for($i=0; $i < count($InterestList); $i++){
                        echo "<div class='match_interst-item'>".$InterestList[$i]."</div>";
                    }
                ?>
            </article>

            <p class="description-tag">Administrative actions</p>
            <article>
                <a href="update.php" id="update-btn">Update</a>
            </article>
        </section>
        <section class="image">
                <img id="picture" src="/img/placeholder.jpg" alt="profile picture">
        </section>
    </wrapper>
</body>
</html>