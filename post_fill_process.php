<?php

session_start();

if (isset($_SESSION["company_name"])) {

    $mysqli = require __DIR__ . "/connection.php";

} else{
    header("Location: company_login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    if ($_POST["n_cpi"]>10||$_POST["n_cpi"]<0) {
        die("Enter Valid cpi");
    }

    $mysqli = require __DIR__ . "/connection.php";
    
    $sql = "INSERT INTO com_post values(?,?,?,?,?);";


$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    echo "SQL error: " . $mysqli->error ;
}

$stmt->bind_param("ssdds",
                  $_SESSION["company_name"],$_POST["n_post"],$_POST["n_sal"],$_POST["n_cpi"],$_POST["n_qual"]);

if($stmt->execute()){
       header("location: post_company.php");
} 
    exit;
}

?>