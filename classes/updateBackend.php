    <?php
    session_start();
    include("mySQL.php");
    $mySQL = new MySQL(true);

    if (isset($_SESSION['userToken'])) {
        $user_id = $_SESSION['userToken'];
        $firstName = (isset($_REQUEST['firstName'])) ? $_REQUEST['firstName']: "";
        $lastName = (isset($_REQUEST['lastName'])) ? $_REQUEST['lastName']: "";
        $age = (isset($_REQUEST['age'])) ? $_REQUEST['age']: "";
        $gender = (isset($_REQUEST['gender'])) ? $_REQUEST['gender']: "";
        $height = (isset($_REQUEST['height'])) ? $_REQUEST['height']: "";
        $username = (isset($_REQUEST['username'])) ? $_REQUEST['username']: "";
        $password = (isset($_REQUEST['userPassword'])) ? $_REQUEST['userPassword']: "";
    }

    if($firstName !="" && $lastName !="" && $age !="" && $gender !="" && $height !="" && $username !="" && $password !=""){
        $passEncrypt = password_hash($password, PASSWORD_DEFAULT);
        $userSQL = "CALL UpdateMaanliUserData('$user_id', '$firstName', '$lastName','$age', '$gender', '$height', '$username', '$passEncrypt');";    
        $mySQL->Query($userSQL);
        header("location: ../profile.php");
    }
?>