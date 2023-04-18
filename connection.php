<?php

$host="localhost";
$dbname="projectdb";
$username="root";
$password="";


$mysqli = new mysqli( $host, $username,$password,  $dbname);

if($mysqli->connect_errno){
    die("CONNECTION ERROR" . $mysqli->connect_error );
}

return $mysqli;