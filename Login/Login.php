<?php
include '../dbConnect.php';


// variables submitted

$loginUser = $_POST['loginUser'];
$loginPass = $_POST['loginPass'];




$sql = "SELECT password FROM players WHERE username = '$loginUser'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      if($row['password'] == $loginPass){
           $usrids =  FindUserId($loginUser);
           echo $usrids;
            
      }else{
          echo 'wrong credentials';
      }
    
  }
} else {
  echo "Invalid data";
}
$conn->close();

function FindUserId($name){
  include '../dbConnect.php';
    $FindID = "SELECT playerid from players WHERE username = '$name'";
    $usrid;
    $res = $conn->query($FindID);
    if ($res->num_rows > 0) {
      while($row = $res->fetch_assoc()) {
        global $usrid;
        $usrid = $row['playerid'];
      }
    }
    return $usrid;
}