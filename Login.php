<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login-style.css">
    <title>Login</title>
</head>
<body id="login-body">
    <section id="login-section">
        <form action="login-back.php" method="post" id="login-form">
            <label>
                <p>Username</p>
                <input type="text" name="userName" id="login-username">
            </label>
            <label>
                <p>Password</p>    
                <input type="password" name="password" id="login-password">
            </label>
            <input type="submit" value="Log In">
        </form>
    </section>    
</body>
</html>