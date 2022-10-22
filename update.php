<?php
    session_start();
    include("classes/mySQL.php");
    $mySQL = new MySQL(true);
    $user_id = $_SESSION['userToken'];
    $profile = "SELECT firstName, lastName, age, gender, height FROM maanliUserProfile WHERE id=$user_id";
    $login = "SELECT username, userPassword FROM maanliUserLogin WHERE id=$user_id";
    $preference = "SELECT minAge, maxAge, prefer_gender FROM maanliUserPreference WHERE id=$user_id";
    $profile_result = $mySQL->Query($profile)->fetch_object();
    $login_result = $mySQL->Query($login)->fetch_object();
    $preference_result = $mySQL->Query($preference)->fetch_object();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update Profile - Maanli Dating</title>
</head>
<body>
    <section id="update">
        <h1>Update profile</h1>

        <form action="backend.php?action=update" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $login_result->username; ?>">
            
            <label for="userPassword">Password:</label>
            <input type="password" id="userPassword" name="userPassword">
            
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" value="<?php echo $profile_result->firstName; ?>">
            
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" value="<?php echo $profile_result->lastName; ?>">
            
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" value="<?php echo $profile_result->age; ?>">
            
            <label for="gender">Gender:</label>
            <select id="gender "name="gender">
                <option value="<?php echo $profile_result->gender; ?>" selected><?php echo $profile_result->gender; ?></option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="nonbinary">Nonbinary</option>
                <option value="other">Other</option>
            </select>
            
            <label for="height">Height in CM:</label>
            <input type="number" id="height" name="height" value="<?php echo $profile_result->height; ?>">
            
            <label for="prefer_gender">Prefered gender:</label>
            <select id="prefer_gender" name="prefer_gender">
                <option value="<?php echo $preference_result->prefer_gender; ?>" selected><?php echo $preference_result->prefer_gender; ?></option>
                <option value="any">Any</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <label for="younger">Max years younger: <span id="vYounger"></span></label>
            <input type="range" min="0" max="100" value="<?php echo $preference_result->minAge; ?>" name="younger" id="younger">
            
            <label for="older">Max years older: <span id="vOlder"></span></label>
            <input type="range" min="0" max="100" value="<?php echo $preference_result->maxAge; ?>" name="older" id="older">
            
            <input type="submit" value="Submit">
         </form>
    </section> 
</body>
</html>