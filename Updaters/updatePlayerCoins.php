<?php
include '../dbConnect.php';

$coins = $_POST['coins'];
$playerid = $_POST['playerid'];

if(isset($coins) && isset($playerid)){
    $sqlUpdate = "UPDATE players SET coins = $coins WHERE playerid = '$playerid';";
    $result = $conn->query($sqlUpdate);
}