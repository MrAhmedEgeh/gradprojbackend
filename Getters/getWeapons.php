<?php
include '../dbConnect.php';


$weapons = array();

if(isset($_POST['playerid'])){
    $id = $_POST['playerid'];
    
    $sql = "SELECT playerid, weapon_name FROM weapons WHERE playerid = '$id'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $weapons['playerid'] = $row['playerid'];
            $weapons['weapon_name'] = $row['weapon_name'];

        }

        echo JSON_encode($weapons);
    }
}

