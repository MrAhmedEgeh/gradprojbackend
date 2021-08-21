<?php
include '../dbConnect.php';


$statistics = array();

if(isset($_POST['playerid'])){
    $id = $_POST['playerid'];
    
    $sql = "SELECT playerid, numberofdeath, numberoflogin FROM statistics WHERE playerid = '$id'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $statistics['playerid'] = $row['playerid'];
            $statistics['numberofdeath'] = $row['numberofdeath'];
            $statistics['numberoflogin'] = $row['numberoflogin'];
        }

        echo JSON_encode($statistics);
    }
}

