    <?php
    session_start();
    include("classes/mySQL.php");
    if(!isset($_SESSION['userToken'])) $_SESSION['userToken'] = 0;
    $database = new MySQL(true);

    $id = $_SESSION['userToken'];
    $firstName = (isset($_REQUEST['firstName'])) ? $_REQUEST['firstName']: "";
    $lastName = (isset($_REQUEST['lastName'])) ? $_REQUEST['lastName']: "";
    $age = (isset($_REQUEST['age'])) ? $_REQUEST['age']: "";
    $gender = (isset($_REQUEST['gender'])) ? $_REQUEST['gender']: "";
    $height = (isset($_REQUEST['height'])) ? $_REQUEST['height']: "";
    $userName = (isset($_REQUEST['userName'])) ? $_REQUEST['userName']: "";
    $password = (isset($_REQUEST['password'])) ? $_REQUEST['password']: "";

    if($firstName !="" && $lastName !="" && $age !="" && $gender !="" && $height !="" && $userName !="" && $password !=""){
        $passEncrypt = password_hash($password, PASSWORD_DEFAULT);
        $userSQL = "CALL UpdateMaanliUserData('$id', '$firstName', '$lastName','$age', '$gender', '$height', '$userName', '$passEncrypt');";    
        $database->Query($userSQL);
        header("location: profile.php");
    }
?>