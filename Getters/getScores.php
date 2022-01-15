<?php
include '../dbConnect.php';


$score = array();

if(isset($_POST['playerid'])){
    $id = $_POST['playerid'];
    $sql = "SELECT player_id, level_id, score FROM scoring WHERE player_id = '$id'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            array_push($score, $row);
        }

        echo JSON_encode($score);
    }
}

