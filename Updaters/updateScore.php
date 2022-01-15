<?php
include '../dbConnect.php';


$playerid = $_POST['playerid'];
$level_id = $_POST['level_id'];
$score = $_POST['score'];


if(isset($playerid) && isset($level_id)){
    $sqlUpdate = "UPDATE scoring SET score = $score WHERE player_id = '$playerid' AND level_id = '$level_id'";
    $result = $conn->query($sqlUpdate);
}