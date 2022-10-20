    <?php
    include("mySQL.php");
    $mySQL = new MySQL(true);

    if (isset($_SESSION['userToken'])) {
        $user_id = $_SESSION['userToken'];
        /*$first_name = "SELECT firstName FROM maanliUserProfile WHERE id=$user_id";
        $last_name = "SELECT lastName FROM maanliUserProfile WHERE id=$user_id";
        $age = "SELECT age FROM maanliUserProfile WHERE id=$user_id";
        $gender = "SELECT gender FROM maanliUserProfile WHERE id=$user_id";
        $height = "SELECT height FROM maanliUserProfile WHERE id=$user_id";*/
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
        $userSQL = "CALL UpdateMaanliUserData('$id', '$firstName', '$lastName','$age', '$gender', '$height', '$username', '$passEncrypt');";    
        $mySQL->Query($userSQL);
        echo "succes";
        exit;
        header("location: ../profile.php");
    }
    else {
        echo "fail";
        exit;
        //header("location: ../profile.php");
    }
?>