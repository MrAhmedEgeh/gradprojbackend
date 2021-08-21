<?php 
include '../dbConnect.php';


$levels = array();






$sql = "SELECT level_id, level_name FROM levels";
$result = $conn->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        array_push($levels, $row);
    }
    $obj = (object) $levels; // convert [{}] to {{}}
    echo JSON_encode($obj);
}


