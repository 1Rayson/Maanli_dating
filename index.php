<?php
    session_start();
    if(!isset($_SESSION['userToken'])) header("location: Login.php");

    include("classes/mySQL.php");
    $database = new MySQL(true);
    $userToken = $_SESSION['userToken'];
    $preferenceQuery = "SELECT * FROM maanliUserPreference WHERE id = $userToken";
    $userPreferences = $database->Query($preferenceQuery)->fetch_object();

    $matchQuery = "
        SELECT firstName, lastName, age, gender 
        FROM maanliUserProfile
        WHERE id != $userToken 
        AND gender = '$userPreferences->prefer_gender'
    ";

    $matchFetch = $database->Query($matchQuery);

    $matchList = [];
    while($row = $matchFetch->fetch_object()) {
        $match = [];
        $match['firstName'] = $row->firstName;
        $match['lastName'] = $row->lastName;
        $match['age'] = $row->age;
        $match['gender'] = $row->gender;

        $matchList[] = $match;
    }

    /* 
    maanliUserProfile
        - firstName
        - lastName
        - age
        - gender
    maanliUserPreference
        - prefer_gender
        - minAge
        - maxAge
    maanliUserInterest
        - interestName
        - userID
    */

    $matchArrayId = isset($_SESSION['matchArrayId']) && $_SESSION['matchArrayId'] < sizeof($matchList) ? $_SESSION['matchArrayId'] : $_SESSION['matchArrayId'] = 0;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Matchlist</title>
</head>
<body>
    <section>
        <a id="profile-button" href="profile.php">Go to profile</a>
    </section>
    <section>
        <!-- picture of match
            <img id="match_picture" src="" alt=""> -->
        <h2 id="match_name"><?php echo $matchList[$matchArrayId]['firstName']." ".$matchList[$matchArrayId]['lastName'] ?></h2>
        <p id="match_gender"><?php echo $matchList[$matchArrayId]['gender'] ?></p>
        <p id="match_age"><?php echo $matchList[$matchArrayId]['age'] ?></p>
        <!-- <div id="match_interest">
            <div class="match_interst-item"><?php /* echo $matchList[$matchArrayId]->interest1 */ ?></div>
            <div class="match_interst-item"><?php /* echo $matchList[$matchArrayId]->interest2 */ ?></div>
            <div class="match_interst-item"><?php /* echo $matchList[$matchArrayId]->interest3 */ ?></div>
        </div> -->
        <a id="match_next-button" href="index-backend.php?nextMatch=true">Next match</a>
    </section>
</body>
</html>