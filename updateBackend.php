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
        $preferedGender = (isset($_REQUEST['prefer_gender'])) ? $_REQUEST['prefer_gender']: "";
        $minAge = (isset($_REQUEST['younger'])) ? $_REQUEST['younger']: "";
        $maxAge = (isset($_REQUEST['older'])) ? $_REQUEST['older']: "";
    }

    if($firstName !="" && $lastName !="" && $age !="" && $gender !="" && $height !="" && $preferedGender !="" && $minAge !="" && $maxAge !="" && $username !="" && $password !="") {
        $passEncrypt = password_hash($password, PASSWORD_DEFAULT);
        $userSQL = "CALL UpdateMaanliUserData('$user_id', '$firstName', '$lastName','$age', '$gender', '$height', '$preferedGender', '$minAge', '$maxAge', '$username', '$passEncrypt');";    
        $mySQL->Query($userSQL);
        header("location: ../profile.php");
    }
?>