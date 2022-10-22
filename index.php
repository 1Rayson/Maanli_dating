<?php
    session_start();
    if(!isset($_SESSION['userToken'])) header("location: Login.php");

    include("classes/mySQL.php");
    $database = new MySQL(true);
    $userToken = $_SESSION['userToken'];
    $preferenceQuery = "
        SELECT maanliUserPreference.prefer_gender, maanliUserPreference.minAge, maanliUserPreference.maxAge, maanliUserProfile.age
        FROM maanliUserPreference 
        LEFT JOIN maanliUserProfile 
        ON maanliUserPreference.id = maanliUserProfile.id
        WHERE maanliUserPreference.id = $userToken
    ";
    $userPreferences = $database->Query($preferenceQuery)->fetch_object();

    $matchQuery = "
        SELECT id, firstName, lastName, age, gender 
        FROM maanliUserProfile
        WHERE id != $userToken 
        AND gender = '$userPreferences->prefer_gender'
        AND age > $userPreferences->age - $userPreferences->minAge
        AND age < $userPreferences->age + $userPreferences->maxAge
    ";

    $matchFetch = $database->Query($matchQuery);

    $matchList = [];
    while($row = $matchFetch->fetch_object()) {
        $match = [];
        $match['id'] = $row->id;
        $match['firstName'] = $row->firstName;
        $match['lastName'] = $row->lastName;
        $match['age'] = $row->age;
        $match['gender'] = $row->gender;

        $matchList[] = $match;
    }

    for($i=0; $i<sizeof($matchList); $i++){
        $matchInterestQuery = "
            SELECT interestName, userID
            FROM maanliUserInterests
            WHERE ".$matchList[$i]['id']." = userID
        ";
        $matchInterestFetch = $database->Query($matchInterestQuery);

        $matchInterestList = [];
        while($row = $matchInterestFetch->fetch_object()) {
            $matchInterestList[] = $row->interestName;
        }

        $matchList[$i]['matchInterestList'] = $matchInterestList;
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
    <wrapper id="match-wrapper">
        <section id="match-info">
            <article>
                <a id="profile-button" href="profile.php">Go to profile</a>
            </article>
            <p class="description-tag">About</p>
            <article>
                <h2 id="match_name"><?php echo $matchList[$matchArrayId]['firstName']." ".$matchList[$matchArrayId]['lastName'] ?></h2>
                <p id="match_age_gender"><?php echo $matchList[$matchArrayId]['age'] ?> / <?php echo $matchList[$matchArrayId]['gender'] ?></p>
            </article>
            
            <p class="description-tag">Interests</p>
            <article id="match_interest">
                <div class="match_interst-item"><?php echo $matchList[$matchArrayId]->interest1 ?></div>
                <div class="match_interst-item"><?php echo $matchList[$matchArrayId]->interest2 ?></div>
                <div class="match_interst-item"><?php echo $matchList[$matchArrayId]->interest3 ?></div>
                <?php
                    $matchInterest = $matchList[$matchArrayId]['matchInterestList'];
                    
                    for($i=0; $i<sizeof($matchInterest); $i++){
                        echo "<div class='match_interst-item'>".$matchInterest[$i]."</div>";
                    }
                ?>
            </article>
        </section>
        <section id="match-image">
            <!-- picture of match
                <img id="match_picture" src="" alt=""> -->
        </section>
        <section id="match-nav">
            <a id="match_next-button" href="index-backend.php?nextMatch=true">Next match</a>
        </section>
    </wrapper>
</body>
</html>