<?php
    session_start();
    if(!isset($_SESSION['userToken'])) header("location: Login.php");

    include_once("classes/mySQL.php");
    include_once("classes/matchFinder.php");
    $userToken = $_SESSION['userToken'];
    $database = new MySQL(true);
    $matchFinder = new matchFinder($userToken, $database);

    $userPreferences = $matchFinder->getUserPreferences();
    $matchList = $matchFinder->findMatches($userPreferences);
    
    $matchArrayId = isset($_SESSION['matchArrayId']) && $_SESSION['matchArrayId'] < sizeof($matchList) ? $_SESSION['matchArrayId'] : $_SESSION['matchArrayId'] = 0;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/img/favicon.png">
    <link rel="stylesheet" href="style.css">
    <title>Matchlist - Maanli Dating</title>
</head>
<body>
    <article id="profile-btn-article">
        <a id="profile-button" href="profile.php">My profile</a>
    </article>
    <wrapper class="wrapper">
        <section class="info">
            <p class="description-tag">About</p>
            <article>
                <div class="name_div">
                    <h2 id="match_name"><?php echo $matchList[$matchArrayId]['firstName'] ?></h2>
                    <h3 id="match_last_name"><?php echo $matchList[$matchArrayId]['lastName'] ?></h3>
                </div>    
                <div class="details">
                    <p id="match_age"><?php echo $matchList[$matchArrayId]['age'] ?></p>
                    <p class="divider">|</p>
                    <p id="match_gender"><?php echo $matchList[$matchArrayId]['gender'] ?></p>
                    <p class="divider">|</p>
                    <p id="match_height"><?php echo $matchList[$matchArrayId]['height'] ?> cm</p>
                </div>
            </article>
            
            <p class="description-tag">Interests</p>
            <article class="interests">
                <?php
                    $matchInterest = $matchList[$matchArrayId]['matchInterestList'];
                    
                    for($i=0; $i<sizeof($matchInterest); $i++){
                        echo "<div class='match_interst-item'>".$matchInterest[$i]."</div>";
                    }
                ?>
            </article>
        </section>
        <section class="image">
                <img id="match_picture" src="/img/placeholder.jpg" alt="match image">
        </section>
        <section id="match-nav">
            <a id="match_next-button" href="backend.php?action=nextMatch">></a>
        </section>
    </wrapper>
</body>
</html>