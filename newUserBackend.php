<?php
    include_once("classes/MySQL.php");
    $mySQL = new MySQL(true);

    // Function used to execute the MySQL query, and convert the response to JSON format - Is this needed???
    function CallMySQL($sqlQuery) {
        // Get access to the global variable $mySQL from the mysql.php script
        global $mySQL;

        // Creates an empty array, in which you can store the data
        $json = [];

        $json['status'] = "success";

        $data = [];

        // $data['firstName'] = "";
        // $data['lastName'] = "";
        // $data['aboutMe'] = "";
        // $data['accessLevel'] = "";
        $result = $mySQL->query($sqlQuery);

        
        while($row = $result->fetch_object()) {
            echo $row->firstName . " " . $row->lastName . " " . $row->aboutMe . " " . $row->accessLevel . " " . $row->createTime;
        }

        $data[] = $result;
        $json['data'] = $data;

        // Convert the JSON aray to JSON format (string), and return it
        return json_encode($json);
    }

    // Variables used to check what action has been requested and what access level is allowed 
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";
    $accessLevel = isset($_REQUEST['access']) ? $_REQUEST['access'] : 0;


    // EDIT ALL OF THIS
    if($action == "userlist") {
        // Check if the user has ADMIN access (1 = user, 5 = admin)
        if($accessLevel == 5) {
            $sql = "SELECT display_name, profile_text, profile_active, access_level, creation_time FROM userprofile ORDER BY id ASC";
        } else {
            $sql = "SELECT display_name, profile_text FROM userprofile ORDER BY id ASC";
        }

        // Return the SQL response to the frontend as JSON
        echo $mySQL->Query($sql, true);
    }

    if($action == "newest") {
        // Check if the user has ADMIN access (1 = user, 5 = admin)
        if($accessLevel == 5) {
            $sql = "SELECT display_name, profile_text, profile_active, access_level, creation_time FROM userprofile ORDER BY id DESC LIMIT 5";
        } else {
            $sql = "SELECT display_name, profile_text FROM userprofile ORDER BY id DESC LIMIT 5";
        }

        // Return the SQL response to the frontend as JSON
        echo $mySQL->Query($sql, true);
    }
?>