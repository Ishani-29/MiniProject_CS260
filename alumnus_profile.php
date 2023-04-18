<?php

session_start();

// print_r($_SESSION);

 if (isset($_SESSION["user_roll"])) {
    
    $mysqli = require __DIR__ . "/connection.php";
    $r=$_SESSION["user_roll"];
    $sql = "SELECT * FROM alumnus WHERE roll_no = \"{$r}\" ";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

    // print_r($user);
}else{
    header("Location: alumnus_login.php");

    exit;
}



?>
<!-- <!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="design.css">
    <title>Home</title>
    <meta charset="UTF-8">
</head>
<body>
    
    <h1>Home</h1>
        <div>
        <p>ROLL NO: <?= htmlspecialchars($user["roll_no"]) ?></p>
        </div>

        <div>
        <p> Name :  <?= htmlspecialchars($user["name"]) ?></p>
        </div>

        <div>
        <p> Current company :<?= htmlspecialchars($user["cur_comp"]) ?></p>
        </div>

        <div>
        <p> Post :<?= htmlspecialchars($user["post"]) ?></p>
        </div>

        <div>
        <p> Position :<?= htmlspecialchars($user["position"]) ?></p>
        </div>

        <div>
        <p> Location :<?= htmlspecialchars($user["location"]) ?></p>
        </div>

        <div>
        <p> Tenure :<?= htmlspecialchars($user["tenure"]) ?></p>
        </div>

        <div>
        <p> CTC :<?= htmlspecialchars($user["CTC"]) ?></p>
        </div>

        <div>
        <p> Email :<?= htmlspecialchars($user["Email"]) ?></p>
        </div>

        <div>
        <p> Mobile No. :<?= htmlspecialchars($user["mobile"]) ?></p>
        </div>

        <div>
        <p> Password :<?= htmlspecialchars($user["password"]) ?></p>
        </div>

        
        


            <p><a href="alumnus_update.php"> UPDATE</a></p><br>
            <p><a href="alumnus_logout_c.php"> LogOut</a></p><br>
</html> -->


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
        <td>Roll No. </td>
        <?php
        // $r = htmlspecialchars($user["roll_no"]) 
       
        echo "<td>" .$user["roll_no"]. "</td>";
        
        ?>
        
        </tr>

        <tr>
        <td>Name </td>
        <?php
        // $r = htmlspecialchars($user["roll_no"]) 
       
        echo "<td>" .$user["name"]. "</td>";
        
        ?>
        
        </tr>

        <tr>
        <td>Email </td>
        <?php
        // $r = htmlspecialchars($user["roll_no"]) 
       
        echo "<td>" .$user["Email"]. "</td>";
        
        ?>
        
        </tr>
        <tr>
        <td>Mobile No. </td>
        <?php
        // $r = htmlspecialchars($user["roll_no"]) 
       
        echo "<td>" .$user["mobile"]. "</td>";
        
        ?>
        
        </tr>

        <tr>
        <td>Current Company </td>
        <?php
        // $r = htmlspecialchars($user["roll_no"]) 
       
        echo "<td>" .$user["cur_comp"]. "</td>";
        
        ?>
        
        </tr>

        <tr>
        <td>Post </td>
        <?php
        // $r = htmlspecialchars($user["roll_no"]) 
       
        echo "<td>" .$user["post"]. "</td>";
        
        ?>
        
        </tr>
        
        <tr>
        <td>Position </td>
        <?php
        // $r = htmlspecialchars($user["roll_no"]) 
       
        echo "<td>" .$user["position"]. "</td>";
        
        ?>
        
        </tr>

        <tr>
        <td>Location</td>
        <?php
        // $r = htmlspecialchars($user["roll_no"]) 
       
        echo "<td>" .$user["location"]. "</td>";
        
        ?>
        
        </tr>
        
        <tr>
        <td>Tenure </td>
        <?php
        // $r = htmlspecialchars($user["roll_no"]) 
       
        echo "<td>" .$user["tenure"]. "</td>";
        
        ?>
        
        </tr>

        <tr>
        <td>CTC </td>
        <?php
        // $r = htmlspecialchars($user["roll_no"]) 
       
        echo "<td>" .$user["CTC"]. "</td>";
        
        ?>
        
        </tr>
   

        <tr>
        <td>Password </td>
        <?php
        // $r = htmlspecialchars($user["roll_no"]) 
       
        echo "<td>" .$user["password"]. "</td>";
        
        ?>
        
        </tr>
        </tbody>
</table>
<div class="btn-group">
<a href="alumnus_update.php" class="button" role="button">Update</a><br><br>
<a href="alumnus_logout.php" class="button" role="button">Logout</a>
        </div>
        </div>
        </div>
       



            <!-- <p><a href="update.php" role="button"> UPDATE</a></p><br>
            <p><a href="logout.php"> LogOut</a></p><br> -->
</html>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    