<?php
include '../dbConnect.php';


$checkpoint = array();

if(isset($_POST['playerid'])){
    $id = $_POST['playerid'];
    
    $sql = "SELECT playerid, level_id, checkpoint FROM checkpoints WHERE playerid = '$id'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $checkpoint['playerid'] = $row['playerid'];
            $checkpoint['level_id'] = $row['level_id'];
            $checkpoint['checkpoint'] = $row['checkpoint'];
        }

        echo JSON_encode($checkpoint);
    }
}

