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
    <!-- Make it labels not placeholders and fix text in input fields + Password must be type password / age type number -->
    <h1>Sign up!</h1>
      <form class="sign-form" action="SignBackend.php" method="post">
        <input type="text" name="firstName" placeholder="Firstname">
        <input type="text" name="lastName" placeholder="Lastname">
        <input type="text" name="age" placeholder="Age">
        <select id="gender" name="gender">
                <option value="none" selected>Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="nonbinary">Nonbinary</option>
                <option value="other">Other</option>
            </select>
        <label for="height">Height in CM:</label>
        <input type="text" name="height" place="Height">
        <input type="text" name="userName" placeholder="Username">
        <input type="text" name="password" placeholder="Password">
        <input type="submit" value="Sign Up">
    </form>
</body>
</html>