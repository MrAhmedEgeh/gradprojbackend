<?php 
include '../dbConnect.php';


$score = array();




$sql = "SELECT player_id, level_id, score FROM scoring";
$result = $conn->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){

        array_push($score, $row);
    }
    
    echo JSON_encode($score);
}


