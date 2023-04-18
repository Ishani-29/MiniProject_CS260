<?php

session_start();

// print_r($_SESSION);
$c=$_SESSION["company_name"];

$p=$_SESSION["password"];
 if (isset($_SESSION["company_name"])) {

    $mysqli = require __DIR__ . "/connection.php";

}else{
    header("Location: company_login.php");

    exit;
}

$sql = "delete from com_post where name=\"{$_SESSION["company_name"]}\" and post=\"{$_GET["id"]}\";";
$mysqli->query($sql);
header("Location: post_company.php");
?>