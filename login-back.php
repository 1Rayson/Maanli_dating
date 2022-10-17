<?php
    include_once("classes/MySQL.php");
    $database = new MySQL(true);

    $query = "SELECT firstName, lastName FROM maanliUserProfile";

    echo $database->Query($query, true);
?>