<?php

session_start();

// print_r($_SESSION);

 if (isset($_SESSION["user_roll"])) {
    
    $mysqli = require __DIR__ . "/connection.php";
    
    $sql = "SELECT * FROM alumnus
            WHERE roll_no = \"{$_SESSION["user_roll"]}\"";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}else{
    die("whaaaaaaaaaaaaaaaaat");

    exit;
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // if ($_POST["cl_10"]>100||$_POST["cl_10"]<0) {
    //     die("Enter Valid percentage in 10th");
    // }

    // if ($_POST["cl_12"]>100||$_POST["cl_12"]<0) {
    //     die("Enter Valid percentage in 12th");
    // }
    // if ($_POST["curr_cpi"]>10||$_POST["curr_cpi"]<0) {
    //     die("Enter Valid cpi");
    // }

    
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
    
    $sql = " UPDATE alumnus  SET name=\"{$_POST["name"]}\" ,cur_comp=\"{$_POST["cur_comp"]}\",post=\"{$_POST["post"]}\" ,position = \"{$_POST["position"]}\", location = \"{$_POST["location"]}\", 
                 tenure = {$_POST["tenure"]}, CTC= {$_POST["CTC"]}, Email = \"{$_POST["Email"]}\", mobile = \"{$_POST["mobile"]}\",
                 password=\"{$_POST["password"]}\" WHERE roll_no=\"{$_SESSION["user_roll"]}\";" ;
     //don't add spacees in the \"
    // if($_POST["salary"]==""){
    //     $sql2 = "UPDATE curr_student  SET salary=NULL where roll_no=\"{$_SESSION["user_roll"]}\";" ;
    //     $mysqli->query($sql2);
    // }

    // if($_POST["salary"]==""){
    //     $sql3 = "UPDATE curr_student  SET place_stat=NULL where roll_no=\"{$_SESSION["user_roll"]}\";" ;
    //     $mysqli->query($sql3);
    // }

    $mysqli->query($sql);

    header("Location: alumnus_profile.php");
    
    exit;    
}

?>


?>
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
<p class="text-center"><h3>Update Alumnus Profile</h3></p> <br>

<h5>Personal Info.</h5>
<table class="table table-dark table-striped table-bordered table-sm">
            <tbody>
            <form method = "post" novalidate >
            <tr>
                <td>ROLL NO </td>
        <?php
        // $r = htmlspecialchars($user["roll_no"]) 
       
        echo "<td>" .$user["roll_no"]. "</td>";
        
        ?>
        
        </tr>

        <tr>
       
        <td><label for = "name" >Name</label</td>
        <!-- <label for = "aoi" >Area of Interest</label> -->
        <td>
        <input type ="text" id="name" name = "name" value=<?= htmlspecialchars($user["name"]) ?>>
</td></tr>

<tr>
       
        <td><label for = "Email" >Area Of Interest</label</td>
        <!-- <label for = "aoi" >Area of Interest</label> -->
        <td>
        <input type ="email" id="Email" name = "Email" value=<?= htmlspecialchars($user["Email"]) ?>>
</td></tr>

<tr>
       
        <td><label for = "mobile" >Mobile No.</label</td>
        <!-- <label for = "aoi" >Area of Interest</label> -->
        <td>
        <input type ="tel" id="mobile" name = "mobile" value=<?= htmlspecialchars($user["mobile"]) ?>>
</td></tr>

</tbody>
</table>

<h5>Professional Info</h5>
<table class="table table-dark table-striped table-bordered table-sm">
            <tbody>
            
           

        <tr>
       
        <td><label for = "cur_comp" >Current Company</label</td>
        <!-- <label for = "aoi" >Area of Interest</label> -->
        <td>
        <input type ="text" id="cur_comp" name = "cur_comp" value=<?= htmlspecialchars($user["cur_comp"]) ?>>
</td></tr>

<tr>
       
        <td><label for = "post" >Post</label</td>
        <!-- <label for = "aoi" >Area of Interest</label> -->
        <td>
        <input type ="text" id="post" name = "post" value=<?= htmlspecialchars($user["post"]) ?>>
</td></tr>

<tr>
       
        <td><label for = "position" >Mobile No.</label</td>
        <!-- <label for = "aoi" >Area of Interest</label> -->
        <td>
        <input type ="text" id="position" name = "position" value=<?= htmlspecialchars($user["position"]) ?>>
</td></tr>

<tr>
       
        <td><label for = "tenure" >Years Of Experience</label</td>
        <!-- <label for = "aoi" >Area of Interest</label> -->
        <td>
        <input type ="number" min="0" max="50" step="0.5" id="tenure" name = "tenure" value=<?= htmlspecialchars($user["tenure"]) ?>>
</td></tr>

<tr>
       
        <td><label for = "location" >Location of Company</label</td>
        <!-- <label for = "aoi" >Area of Interest</label> -->
        <td>
        <input type ="text" id="location" name = "location" value=<?= htmlspecialchars($user["location"]) ?>>
</td></tr>

<tr>
       
        <td><label for = "CTC" >CTC</label</td>
        <!-- <label for = "aoi" >Area of Interest</label> -->
        <td>
        <input type ="number" min="0" step="0.1" id="CTC" name = "CTC" value=<?= htmlspecialchars($user["CTC"]) ?>>
</td></tr>



</tbody>
</table>
<h5>Update Password</h5>  

<table class="table table-dark table-striped table-bordered table-sm">
            <tbody>
            
       
        <tr>
        <td><label for = "password" >Password</label></td>
        <!-- <label for = "aoi" >Area of Interest</label> -->
        <td>
        <input type ="text" id="password" name = "password"  value=<?= htmlspecialchars($user["password"]) ?> >
</td></tr>

</tbody>
</table>

    
        

        <button class="button">Save Changes</button>

    </form>

    <br>
    Return to <a href="alumnus_home.php">HOME</a><br>
</body>
</html>




