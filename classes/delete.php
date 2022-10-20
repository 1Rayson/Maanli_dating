<?php
session_start();
include("classes/mySQL.php");
if(!isset($_SESSION['userToken'])) $_SESSION['userToken'] = 0;
$database = new MySQL(true);

$id=$_SESSION['userToken'];
$delete = "DELETE FROM maanliUserProfile WHERE id=$id";
$result = $mySQL->Query($delete);
if($result){
    echo " <div align='center'>";
    echo "Account Deleted Successfully.";
    echo " <a href='index.php' >Click here</a> to go back. ";
    echo "</div> ";
} elseif(!isset($_SESSION['userToken']) || $_SESSION['userToken']==NULL) {
 header("Location: index.php");
} else {
 echo "Unable to delete your account";
}

?>