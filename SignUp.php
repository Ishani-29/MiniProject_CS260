<?php

if (empty($_POST["roll_no"])) {
    die("ROll Number is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["c_password"]) {
    die("Passwords do not match");
}

$s=$_POST["roll_no"];
$temp=intval($s[0].$s[1]);
$y=strval(2025 - (21 - $temp));
$b=$s[4].$s[5];
$d=intval($s[2].$s[3]);
$d1="";

if ($d==1){
    $d="Btech";
}else{
    $d="Mtech";
}

$mysqli = require __DIR__ ."/connection.php";
$sql = "INSERT INTO curr_student(roll_no,branch,batch_year,password,min_qual) values(?,?,?,?,?); ";


$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    echo "SQL error: " . $mysqli->error ;
}

$stmt->bind_param("sssss",
                  $_POST["roll_no"],$b,$y,$_POST["password"],$d);

if($stmt->execute()){
    
    echo '<script>alert("SignUp successful");
    window.location.href="login.php";
    </script>';
    
}

   
 else {
    
    if ($mysqli->errno === 1062) {
        die("Already Registered");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}







