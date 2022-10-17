<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maanli Dating</title>
</head>
<body>
    <section>
        <h1>Create new user</h1>
        <form action="create_new_user.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <label for="username">Password:</label>
            <input type="password" id="userPassword" name="userPassword">
            <label for="username">First Name:</label>
            <input type="text" id="firstName" name="firstName">
            <label for="username">Last Name:</label>
            <input type="text" id="lastName" name="lastName">
            <label for="age">Age:</label>
            <input type="number" id="age" name="age">
            <label for="gender">Gender:</label>
            <select id="gender "name="gender">
                <option value="none" selected>Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="nonbinary">Nonbinary</option>
                <option value="other">Other</option>
            </select>
            <label for="height">Height in CM:</label>
            <input type="number" id="height" name="height">
            <input type="submit" value="Submit">

            <!--<input type="password" value="Password" onclick="callAPI('userlist', '1')"> -->
         </form>
    </section>

    <script>
        /* async function callAPI(endpoint, accessLevel) {
            let response = await fetch("backend.php?action=" + endpoint + "&access=" + accessLevel);
            let data = await response.text();
            let outputDOM = document.querySelector("#output");
            outputDOM.innerHTML = data;
        }*/
    </script>
</body>
</html>