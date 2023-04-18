<!DOCTYPE html>
<head>
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
    <p class="head"><h1>LIST OF ELIGIBLE STUDENTS</h1></p>


<?php

session_start();

// print_r($_SESSION);
 if (isset($_SESSION["company_name"])) {

    $mysqli = require __DIR__ . "/connection.php";

}else{
    header("Location: company_login.php");

    exit;
}
?>

    <?php
$sql = "select * from curr_student where place_stat!=\"{$_SESSION["company_name"]}\";";
$result = $mysqli->query($sql);
?>

<table class="table table-bordered table-striped table-dark">
    <tr>
        <th>Roll No.</th>
        <th>10th Marks</th>
        <th>12th Marks</th>
        <th>CPI</th>
        <th>Age</th>
        <th>Branch</th>
        <th>Area of Interest</th>
    </tr>
    <?php
while($row=mysqli_fetch_assoc($result)){
    ?>
    <tr>
        <th><?php echo $row["roll_no"] ?></th> 
        <th><?php echo $row["cl_10"] ?></th>
        <th><?php echo $row["cl_12"] ?></th>
        <th><?php echo $row["curr_cpi"] ?></th>
        <th><?php echo $row["age"] ?></th>
        <th><?php echo $row["branch"] ?></th>
        <th><?php echo $row["aoi"] ?></th>
    </tr>
    <?php } ?>

</table>
<a href="post_company.php" class="button" role="button">RETURN</a>
</div></div></body>
</html>