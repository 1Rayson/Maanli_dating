 <?php
        session_start();
        include("mySQL.php");
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
    <h1>Sign up!</h1>
      <form action="sign-up.php" method="post">
        <input type="text" name="firstName" placeholder="Firstname">
        <input type="text" name="lastName" placeholder="Lastname">
        <input type="text" name="userName" placeholder="Username">
        <input type="text" name="password" placeholder="Password">
        <input type="submit">
    </form>
</body>
</html>