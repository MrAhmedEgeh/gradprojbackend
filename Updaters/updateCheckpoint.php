<?php
include '../dbConnect.php';

$levelID = $_POST['levelID'];
$playerid = $_POST['playerid'];
$point = $_POST['point'];

if(isset($levelID) && isset($playerid)){
    $sqlUpdate = "UPDATE checkpoints SET checkpoint = '$point' WHERE playerid = '$playerid' AND level_id = '$levelID';";
    $result = $conn->query($sqlUpdate);
}