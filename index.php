<?php
    session_start();
    
    if(!isset($_SESSION['userToken'])) header("location: Login.php");

    /* temperary array of matches */
    $testUsers = [
        (object) [
            'name' => 'Dick Sucky',
            'age' => 25,
            'sexualPreference' => 'female',
            'gender' => 'male',
            'interest1' => 'cars',
            'interest2' => 'hair',
            'interest3' => 'party'
        ],
        (object) [
            'name' => 'Justine Case',
            'age' => 22,
            'sexualPreference' => 'male',
            'gender' => 'female',
            'interest1' => 'make-up',
            'interest2' => 'social media',
            'interest3' => 'party'
        ]
    ];

    $match = isset($_SESSION['match']) && $_SESSION['match'] < sizeof($testUsers) ? $_SESSION['match'] : $_SESSION['match'] = 0;
    
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
        <img id="match_picture" src="" alt=""> <!-- picture of match -->
        <h2 id="match_name"><?php echo $testUsers[$match]->name ?></h2>
        <p id="match_gender"><?php echo $testUsers[$match]->gender ?></p>
        <p id="match_age"><?php echo $testUsers[$match]->age ?></p>
        <div id="match_interest">
            <div class="match_interst-item"><?php echo $testUsers[$match]->interest1 ?></div>
            <div class="match_interst-item"><?php echo $testUsers[$match]->interest2 ?></div>
            <div class="match_interst-item"><?php echo $testUsers[$match]->interest3 ?></div>
        </div>
        <a id="match_next-button" href="index-backend.php?nextMatch=true">Next match</a>
    </section>
</body>
</html>