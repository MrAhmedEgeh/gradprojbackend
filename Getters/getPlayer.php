<?php
include '../dbConnect.php';


$player = array();

if(isset($_POST['playerid'])){
    $id = $_POST['playerid'];
    $sql = "SELECT playerid, username, level_id, coins FROM players WHERE playerid = '$id'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $player['playerid'] = $row['playerid'];
            $player['username'] = $row['username'];
            $player['level_id'] = $row['level_id'];
            $player['coins'] = $row['coins'];
        }

        echo JSON_encode($player);
    }
}

