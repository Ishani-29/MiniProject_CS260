<?php
 if ($_SERVER["REQUEST_METHOD"] === "POST") {
if (empty($_POST["name"])&&empty($_POST["post"])) {
    die("Company name and Post are required");
}


$mysqli = require __DIR__ ."/connection.php";
$sql = "INSERT INTO com_post(name,post) values(?,?); ";


$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    echo "SQL error: " . $mysqli->error ;
}

$stmt->bind_param("ss",
                  $_POST['name'],$_POST["post"]);
if($stmt->execute()){

    header("location:com_post_table.php");
}

   
 else {
    
    if ($mysqli->errno === 1062) {
        die("Already Registered");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
 }
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design.css">
    <title>Insert</title>
</head>
<body>
    <h1>insert new company post </h1>
    <form method = "post" novalidate >
        <div>
        <label for = "name" >Company Name</label>
        <input type ="text" id="name" name = "name">
        </div>

        <div>
        <label for = "post" >POST</label>
        <input type ="text" id="post" name = "post">
        </div>

        <button>insert</button>

    </form>
</body>
</html>







