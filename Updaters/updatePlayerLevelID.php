<?php
include '../dbConnect.php';

$levelID = $_POST['levelID'];
$playerid = $_POST['playerid'];

if(isset($playerid) && isset($levelID)){
    $sqlUpdate = "UPDATE players SET level_id = $levelID WHERE playerid = '$playerid';";
    $result = $conn->query($sqlUpdate);
}