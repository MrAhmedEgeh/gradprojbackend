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
            echo 'Login seccsssful';
            // get user data
      }else{
          echo 'wrong credentials';
      }
    
  }
} else {
  echo "Invalid data";
}
$conn->close();