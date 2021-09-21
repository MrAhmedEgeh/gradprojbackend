<?php
include '../dbConnect.php';

$levelID = $_POST['levelID'];
$playerid = $_POST['playerid'];
$point = $_POST['point'];

if(isset($levelID) && isset($playerid)){
    $sqlInsert = "INSERT INTO checkpoints (playerid, level_id, checkpoint) VALUES ('$playerid', '$levelID', '$point');";
    $result = $conn->query($sqlInsert);
}