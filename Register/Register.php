<?php


// USERNAME & EMAIL IS NOT IN DB ALREADY

//SUBMIT AND CREATE ROWS IN ALL TABLES



$usernames = $_POST['username'];
$emails = $_POST['emails'];
$password = $_POST['password'];

if(checkDBusername($usernames) && checkDBemail($emails)){ // both must not exist
    createNewRows($usernames, $password, $emails);
}else{
    echo "username or email exist";
}

function checkDBusername($user){  // check if USERNAME exist already in DB
    include '../dbConnect.php';  // we cannot user 'username' as param because it exist in dbConnect and have value of 'root'
    $sql1 = "SELECT * FROM players WHERE username = '$user'";
    $res1 = mysqli_query($conn, $sql1);
    $count1 = mysqli_num_rows($res1);

    return $count1 <= 0 ? true : false; // true if there's no record, false if there is
}



function checkDBemail($email){  // check if email exist already in DB
    include '../dbConnect.php';  
    $sql2 = "SELECT * FROM players WHERE email = '$email'";
    $res2 = mysqli_query($conn, $sql2);
    $count2 = mysqli_num_rows($res2);


    return $count2 <= 0 ? true : false; // true if there's no record, false if there is
}

function createNewRows($user, $pass, $email){ // it will create rows whereever we have PK and FK
    include '../dbConnect.php';  
    // 1. PLAYERS TABLE
    $player = "INSERT INTO players (username, password, email, level_id, coins) VALUES ('$user', '$pass', '$email', 1, 0)";  

    if ($conn->query($player) === TRUE){
        $selectID = "SELECT playerid from players WHERE username = '$user'";
        $res = mysqli_query($conn, $selectID);
        while($rows = $res->fetch_assoc()){
            $id = $rows['playerid'];
        }
    } else {
        echo "Error: " . $player . "<br>" . $conn->error;
    }

    // 2. SCORING TABLE
    if(isset($id)){
        $scoring = "INSERT INTO scoring (player_id, level_id, score) VALUES ('$id', 1, 0)";  
        $bools = mysqli_query($conn, $scoring);
        if($bools){
            $scoring2 = "INSERT INTO scoring (player_id, level_id, score) VALUES ('$id', 2, 0)";  
            $mybool = mysqli_query($conn, $scoring2);
            if($mybool){
                $scoring3 = "INSERT INTO scoring (player_id, level_id, score) VALUES ('$id', 3, 0)";  
                $mybool = mysqli_query($conn, $scoring3);
            }
        }
    }
    
}