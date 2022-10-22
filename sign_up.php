<?php
    session_start();  
    if(isset($_SESSION['userToken'])) header("location: index.php");
    
    $fail=false;  
    if(isset($_REQUEST["signup"])) $fail=true;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sign up</title>
</head>
<body>
    <main>
        <h1>Sign up!</h1>
        <form action="backend.php?action=signup" method="post">
            <?php 
                if($fail)echo "<p id='fail_text'>One or more fields have not been filled out</p>";
            ?>
            <label for="firstName">
                Firstname
                <input type="text" name="firstName" placeholder="Firstname">
            </label>
            <label for="lastName">
                Lastname
                <input type="text" name="lastName" placeholder="Lastname">
            </label>
            <label for="age">
                Age
                <input type="number" name="age" placeholder="Age">
            </label>
            <label for="gender">
                Gender
                <select id="gender" name="gender">
                    <option value="none" selected>Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="nonbinary">Nonbinary</option>
                    <option value="other">Other</option>
                </select>
            </label>
            <label for="height">
                Height in CM:
                <input type="number" name="height" place="Height">
            </label>
            <label for="userName">
                Username
                <input type="text" name="userName" placeholder="Username">
            </label>
            <label for="password">
                Password 
                <input type="password" name="password" placeholder="Password">
            </label>
            <label for="younger">
                <p>max years younger: <span id="vYounger"></span></p>
                <input type="range" min="0" max="100" value="0" name="younger" id="younger">
            </label>
            <label for="older">
                <p> Max years older: <span id="vOlder"></span></p>
                <input type="range" min="0" max="100" value="0" name="older" id="older">
            </label>
            <label for="prefer_gender">
                Prefered gender
                <select id="prefer_gender" name="prefer_gender">
                    <option value="any" selected>Any</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </label>
            <label for="interests">
                Hobbies / interests
                <select name="interest1" id="interest1">
                    <option value="none">none</option>
                    <option value="gamer">gamer</option>
                    <option value="fitness">fitness</option>
                    <option value="outdoors">outdoors</option>
                    <option value="travel">travel</option>
                </select>
                <select name="interest2" id="interest2">
                    <option value="none">none</option>
                    <option value="gamer">gamer</option>
                    <option value="fitness">fitness</option>
                    <option value="outdoors">outdoors</option>
                    <option value="travel">travel</option>
                </select>
                <select name="interest3" id="interest3">
                    <option value="none">none</option>
                    <option value="gamer">gamer</option>
                    <option value="fitness">fitness</option>
                    <option value="outdoors">outdoors</option>
                    <option value="travel">travel</option>
                </select>
            </label>
            <input type="submit" value="Sign Up">
        </form>
        
        <p class="link">Already a member?<a href="Login.php"> Click here to log in</a></p>
    </main>
</body>

<script>
var youngerSlider = document.getElementById("younger");
var olderSlider = document.getElementById("older");
var yOutput = document.getElementById("vYounger");
var oOutput = document.getElementById("vOlder");
yOutput.innerHTML = youngerSlider.value;
oOutput.innerHTML = olderSlider.value;

youngerSlider.oninput = function() {
  yOutput.innerHTML = this.value;
}
olderSlider.oninput = function() {
  oOutput.innerHTML = this.value;
}
</script>
</html>