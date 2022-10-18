 <?php
    session_start();
    include("classes/mySQL.php");
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
    <!-- fix text in input fields -->
    <h1>Sign up!</h1>
      <form class="sign-form" action="SignBackend.php" method="post">
        <label for="firstName">Firstname</label>
        <input type="text" name="firstName" placeholder="Firstname">
        <label for="lastName">Lastname</label>
        <input type="text" name="lastName" placeholder="Lastname">
        <label for="age">Age</label>
        <input type="text" name="age" placeholder="Age">
        <label for="gender">Gender</label>
        <select id="gender" name="gender">
                <option value="none" selected>Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="nonbinary">Nonbinary</option>
                <option value="other">Other</option>
            </select>
        <label for="height">Height in CM:</label>
        <input type="number" name="height" place="Height">
        <label for="userName">Username</label>
        <input type="text" name="userName" placeholder="Username">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password">
        <input type="submit" value="Sign Up">
    </form>
</body>
</html>