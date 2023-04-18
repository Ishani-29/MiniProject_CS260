<?php


if (empty($_POST["company_name"])) {
    die("Company name is required");
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
$s=$_POST["company_name"];
// $temp=intval($s[0].$s[1]);
// $y=strval(2025 - (21 - $temp));
// $b=$s[4].$s[5];
// $d=intval($s[2].$s[3]);
// $d1="";

// if ($d==1){
//     $d="Btech";
// }else{
//     $d="Mtech";
// }

$mysqli = require __DIR__ ."/connection.php";

// $sql = "INSERT INTO com_post(company_name,password) values(\"{$_POST["company_name"]}\",\"{$_POST["password"]}\"); ";
$sql = "INSERT INTO com_post(name,password) values(?,?);";


$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    echo "SQL error: " . $mysqli->error ;
}

$stmt->bind_param("ss",
                  $_POST["company_name"],$_POST["password"]);

if($stmt->execute()){
    echo '<script>alert("SignUp successful");
    window.location.href="company_login.php";
    </script>';
                }   
 

    if ($mysqli->errno === 1062) {
        die("Already Registered");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
    ?>








