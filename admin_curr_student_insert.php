<?php
 if ($_SERVER["REQUEST_METHOD"] === "POST") {
if (empty($_POST["roll_no"])) {
    die("ROll Number is required");
}



$mysqli = require __DIR__ ."/connection.php";
$sql = "INSERT INTO curr_student(roll_no,password) values(?,?); ";


$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    echo "SQL error: " . $mysqli->error ;
}

$stmt->bind_param("ss",
                  $_POST["roll_no"],$_POST["password"]);
if($stmt->execute()){

    header("location:student_table.php");
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
<title>Update Student Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

  <style>
  .jumbotron {
    background-color: #FAE6FA;
    color: black;
    align-self: center;
    margin-top: 50px;
    width: 80%;
    align-content: center;
    margin-left: 100px;
  }
  .button {
  background-color: white;
  border: none;
  color: black;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  width: 20%;
  border-radius: 5px;
}
  </style>

</head>
<body>
<div class="container">
<div class="jumbotron text-center">
<p class="text-center"><h3>Update Student Profile</h3></p> <br>
<table class="table table-dark table-striped table-bordered table-sm">
    <form method = "post" novalidate >
        <tr>
        <td><label for = "roll_no" >ROLL No.</td>
        <td><input type ="text" id="roll-no" name = "roll_no"></td>
</tr>

        <tr>
        <td><label for = "password" >Password</label></td>
        <td><input type ="text" id="password" name = "password"></td>
</tr>

</table>
        <button class="button">Insert</button>

    </form>
</body>
</html>







