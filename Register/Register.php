<?php


// USERNAME & EMAIL IS NOT IN DB ALREADY

//SUBMIT AND CREATE ROWS IN ALL TABLES



$usernames = 'mama122';
$emails = "mama122@emu.edu.trs";
$password = '19982020';

if(checkDBusername($usernames) && checkDBemail($emails)){ // both must not exist
        echo "ready to insert";
}else{
    echo "<br> username or email exist";
}

function checkDBusername($user){  // check if USERNAME exist already in DB
    include '../dbConnect.php';  // we cannot user 'username' as param because it exist in dbConnect and have value of 'root'
    $sql1 = "SELECT * FROM players WHERE username = '$user'";
    $res1 = mysqli_query($conn, $sql1);
    $count1 = mysqli_num_rows($res1);
    echo $count1."username <br>";
    return $count1 <= 0 ? true : false; // true if there's no record, false if there is
}



function checkDBemail($email){  // check if email exist already in DB
    include '../dbConnect.php';  
    $sql2 = "SELECT * FROM players WHERE email = '$email'";
    $res2 = mysqli_query($conn, $sql2);
    $count2 = mysqli_num_rows($res2);
    echo $count2."email <br>";

    return $count2 <= 0 ? true : false; // true if there's no record, false if there is
}

function createNewRows(){ // it will create rows whereever we have PK and FK

    // 1. PLAYERS TABLE

    // 2. WEAPON TABLE
    
    // 3. STATISTICS TABLE

    // 2. CHECKPOINT TABLE
}