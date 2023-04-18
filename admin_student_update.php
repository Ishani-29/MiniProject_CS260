<?php

session_start();

 if (isset($_SESSION["user_roll"])) {
    
    $mysqli = require __DIR__ . "/connection.php";
    
    $sql = "SELECT * FROM student
            WHERE roll_no = \"{$_SESSION["user_roll"]}\"";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}else{
    die("whaaaaaaaaaaaaaaaaat");

    exit;
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    if ($_POST["cl_10"]>100||$_POST["cl_10"]<0) {
        die("Enter Valid percentage in 10th");
    }

    if ($_POST["cl_12"]>100||$_POST["cl_12"]<0) {
        die("Enter Valid percentage in 12th");
    }
    if ($_POST["curr_cpi"]>10||$_POST["curr_cpi"]<0) {
        die("Enter Valid cpi");
    }

    
    if (strlen($_POST["password"]) < 8) {
        die("Password must be at least 8 characters");
    }
    
    if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
        die("Password must contain at least one letterr");
    }
    
    if ( ! preg_match("/[0-9]/", $_POST["password"])) {
        die("Password must contain at least one number");
    }


    $mysqli = require __DIR__ . "/connection.php";
    
    $sql = " UPDATE student  SET name = \"{$_POST["name"]}\",cl10_marks = {$_POST["cl_10"]} ,cl12_marks={$_POST["cl_12"]},cur_cpi={$_POST["curr_cpi"]} ,age = {$_POST["age"]}, aoi = \"{$_POST["aoi"]}\", 
                 place_stat = \"{$_POST["place_stat"]}\",
                 salary={$_POST["salary"]} , password=\"{$_POST["password"]}\"  WHERE roll_no=\"{$_SESSION["user_roll"]}\";" ;
     //don't add spacees in the \"

    $mysqli->query($sql);

    header("Location: student_table.php");
    
    exit;    
}

?>
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
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
<p class="text-center"><h3>Update Student Profile</h3></p> <br>
<table class="table table-dark table-striped table-bordered table-sm">

        <tr>
        <td><p>ROLL NO</td><td> <?= htmlspecialchars($user["roll_no"]) ?></p></td>
</tr>

        <tr>
        <td><p> Branch </td><td>  <?= htmlspecialchars($user["branch"]) ?></p></td>
</tr>

        <tr>
       <td> <p> Batch_year</td><td><?= htmlspecialchars($user["batch_year"]) ?></p></td>
</tr>

        <tr>
<td><p> Qual </td><td><?= htmlspecialchars($user["min_qual"]) ?></p></td>
</tr>



    <form method = "post" novalidate >

    <tr>

        <td><label for = "name" >Name</label></td>
        <td><input type ="text" id="name" name = "name" value=<?= htmlspecialchars($user["name"]) ?>></td>
</tr>


        <tr>
           <td> <label for = "cl_10" >CLass 10th</label></td>
           <td> <input type ="number" min="0" max="10" step="0.1" id="cl_10" name = "cl_10" value=<?= htmlspecialchars($user["cl10_marks"]) ?>></td>
</tr>

        

        <tr>
           <td> <label for = "cl_12" >CLass 12th</label></td>
           <td> <input type ="number" min="0" max="100" step="0.1" id="cl_12" name = "cl_12" value=<?= htmlspecialchars($user["cl12_marks"]) ?>></td>
</tr>

        <tr>
       <td> <label for = "curr_cpi" >CPI</label></td>
        <td><input type ="number" min="0" max="10" step="0.01"  id="curr_cpi" name = "curr_cpi"  value=<?= htmlspecialchars($user["cur_cpi"]) ?> ></td>
</tr>

        <tr>
        <td><label for = "age" >AGE</label></td>
        <td><input type ="number" min="0" max="100" step="1" id="age" name = "age"  value=<?= htmlspecialchars($user["age"]) ?> ></td>
</tr>

        <tr>
        <td><label for = "aoi" >Area of Interest</label></td>
        <td><input type ="text" id="aoi" name = "aoi" value=<?= htmlspecialchars($user["aoi"]) ?>></td>
</tr>
        
        
         <tr>
       <td> <label for = "place_stat" >Company Working in </label></td>
        <td><input type ="text" id="place_stat" name = "place_stat"  value=<?= htmlspecialchars($user["place_stat"]) ?> ></td>
</tr>
        <tr>
        <td><label for = "salary" >Salary : </label></td>
        <td><input type ="number" step="1"  id="salary" name = "salary"  value=<?= htmlspecialchars($user["salary"]) ?> ></td>
</tr>
</table>
        <h2> Update password </h2>
        <table class="table table-dark table-striped table-bordered table-sm">
        <tr>
        <td><label for = "password" >Password</label></td>
        <td><input type ="text" id="password" name = "password"  value=<?= htmlspecialchars($user["password"]) ?> ></td>
</tr>

        
</table>
        <button class="button">Save Changes</button>

    </form>

    <br>
    return to <a href="student_table.php">HOME</a><br>
</div></div>
</body>
</html>