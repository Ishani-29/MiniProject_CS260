<?php

session_start();

// print_r($_SESSION);

 if (isset($_SESSION["user_roll"])) {
    
    $mysqli = require __DIR__ . "/connection.php";
    $r=$_SESSION["user_roll"];
    $sql = "SELECT * FROM curr_student WHERE roll_no = \"{$r}\" ";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

    // print_r($user);
}else{
    header("Location: login.php");

    exit;
}



?>
<!DOCTYPE html>
<html>
<head>

<title>Student Profile</title>
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
    width: 100%;
    align-content: center;
    margin-left: 30px;
    border-radius: 0;
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
  width: 50%;
  border-radius: 5px;
}
  </style>
</head>
<body>
    
   
<div class="container"><br><br>
<div class="jumbotron text-center">
<p class="text-center"><h3>Student Profile</h3></p>
        <table class="table table-dark table-striped table-bordered table-sm">
            <tbody>
            <tr>
        <td>ROLL NO </td>
        <?php
        // $r = htmlspecialchars($user["roll_no"]) 
       
        echo "<td>" .$user["roll_no"]. "</td>";
        
        ?>
        
        </tr>

        <tr>
        <td>Branch </td>
        <?php
        // $r = htmlspecialchars($user["roll_no"]) 
       
        echo "<td>" .$user["branch"]. "</td>";
        
        ?>
        
        </tr>

        <tr>
        <td>Batch Year </td>
        <?php
        // $r = htmlspecialchars($user["roll_no"]) 
       
        echo "<td>" .$user["batch_year"]. "</td>";
        
        ?>
        
        </tr>
        
        <?php if (!is_null($user["cl_10"])): ?>
        <tr>
        <td>Class 10th</td>
         <?php
         echo "<td>" .$user["cl_10"]. "</td>";
         ?>
         </tr>
        <?php else: ?>
            <tr>
        <td>Class 10th</td>
        <td> to be updated </td>
        </tr>
        <?php endif; ?>
        
        <?php if (!is_null($user["cl_12"])): ?>
        <tr>
        <td>Class 12th</td>
         <?php
         echo "<td>" .$user["cl_12"]. "</td>";
         ?>
         </tr>
        <?php else: ?>
            <tr>
        <td>Class 12th</td>
        <td> to be updated </td>
        </tr>
        <?php endif; ?>

        <?php if (!is_null($user["curr_cpi"])): ?>
        <tr>
        <td>CPI</td>
         <?php
         echo "<td>" .$user["curr_cpi"]. "</td>";
         ?>
         </tr>
        <?php else: ?>
            <tr>
        <td>CPI</td>
        <td> to be updated </td>
        </tr>
        <?php endif; ?>

     
        <?php if (!is_null($user["age"])): ?>
        <tr>
        <td>Age</td>
         <?php
         echo "<td>" .$user["age"]. "</td>";
         ?>
         </tr>
        <?php else: ?>
            <tr>
        <td>Age</td>
        <td> to be updated </td>
        </tr>
        <?php endif; ?>

        <?php if (!is_null($user["aoi"])): ?>
        <tr>
        <td>Area Of Interest</td>
         <?php
         echo "<td>" .$user["aoi"]. "</td>";
         ?>
         </tr>
        <?php else: ?>
            <tr>
        <td>Area Of Interest</td>
        <td> to be updated </td>
        </tr>
        <?php endif; ?>

        <?php if (!is_null($user["aoi"])): ?>
        <tr>
        <td>Preference list of companies</td>
         <?php
         echo "<td>" .$user["c1"]. "<br>" .$user["c2"]. "<br>" .$user["c3"]. "</td>";
         ?>
         </tr>
        <?php else: ?>
            <tr>
        <td>Preference list of companies</td>
        <td> to be updated </td>
        </tr>
        <?php endif; ?>

        <?php if ($user["place_stat"]==""||$user["place_stat"]=="NULL"||is_null($user["place_stat"])): ?>
        <tr>
        <td>Placement Status</td>
        <td>Not Yet Placed</td>
        
         </tr>
        <?php else: ?>
            <tr>
        <td>Complany placed in</td>
        <?php
         echo "<td>" .$user["place_stat"]. "</td>";
         ?>
        </tr>
        <tr>
        <td>Salary</td>
        <?php
         echo "<td>" .$user["salary"]. "</td>";
         ?>
        </tr>
        <?php endif; ?>

        <?php if (!is_null($user["transcript"])): ?>
        <tr>
        <td>Transcript(gdrive link)</td>
         <?php
         echo "<td><u>" .$user["transcript"]. "</u></td>";
         ?>
         </tr>
        <?php else: ?>
            <tr>
        <td>Transcript</td>
        <td> to be updated </td>
        </tr>
        <?php endif; ?>

        </tbody>
</table>
<div class="btn-group">
<a href="update.php" class="button" role="button">Update</a><br><br>
<a href="logout.php" class="button" role="button">Logout</a>
        </div>
        </div>
        </div>
       



            <!-- <p><a href="update.php" role="button"> UPDATE</a></p><br>
            <p><a href="logout.php"> LogOut</a></p><br> -->
</html>
    
    
    
    
    
    
    
    
    
    
    