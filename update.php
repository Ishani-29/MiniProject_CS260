<?php

session_start();

// print_r($_SESSION);

 if (isset($_SESSION["user_roll"])) {
    
    $mysqli = require __DIR__ . "/connection.php";
    
    $sql = "SELECT * FROM curr_student
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
    if(!isset($_POST['checkbox_name']))
{
    die("Accept the T&C by checking the checkbox");
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
    

    if($_POST["salary"]==""){
        $sql = "UPDATE curr_student  SET cl_10={$_POST["cl_10"]} ,cl_12={$_POST["cl_12"]},curr_cpi={$_POST["curr_cpi"]} ,age = {$_POST["age"]}, aoi = \"{$_POST["aoi"]}\", 
                 c1 = \"{$_POST["c1"]}\", c2= \"{$_POST["c2"]}\", c3 = \"{$_POST["c3"]}\", place_stat = NULL ,
                 salary=NULL ,transcript=\"{$_POST["transcript"]}\", password=\"{$_POST["password"]}\"  WHERE roll_no=\"{$_SESSION["user_roll"]}\";" ;
     //don't add spacees in the \"

    $mysqli->query($sql);
    }else{
        $sql = "UPDATE curr_student  SET cl_10={$_POST["cl_10"]} ,cl_12={$_POST["cl_12"]},curr_cpi={$_POST["curr_cpi"]} ,age = {$_POST["age"]}, aoi = \"{$_POST["aoi"]}\", 
        c1 = \"{$_POST["c1"]}\", c2= \"{$_POST["c2"]}\", c3 = \"{$_POST["c3"]}\", place_stat = \"{$_POST["place_stat"]}\",
        salary={$_POST["salary"]} ,transcript=\"{$_POST["transcript"]}\", password=\"{$_POST["password"]}\"  WHERE roll_no=\"{$_SESSION["user_roll"]}\";" ;
//don't add spacees in the \"

$mysqli->query($sql);
    }

   

    header("Location: profile.php");
    
    exit;    
}

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
<p class="text-center"><h3>Update Student Profile</h3></p> <br>
<h5>Personal Info.</h5>
<table class="table table-dark table-striped table-bordered table-sm">
            <tbody>
            <form method = "post" novalidate >
                <tr>
                <td>Name </td>
        <?php
        // $r = htmlspecialchars($user["roll_no"]) 
       
        echo "<td>" .$user["roll_no"]. "</td>";
        
        ?>
        
        </tr>
        <tr>
            
        <td><label for = "age" >Age</label</td>
        <!-- <label for = "aoi" >Area of Interest</label> -->
        <td>
        <input type ="number" min="0" max="100" step="1" id="age" name = "age"  value=<?= htmlspecialchars($user["age"]) ?> >
</td>
        
        </tr>
</tbody>
</table>

<h5>Academic Details</h5>

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
        <tr>
       
        <td><label for = "aoi" >Area Of Interest</label</td>
        <!-- <label for = "aoi" >Area of Interest</label> -->
        <td>
        <input type ="text" id="aoi" name = "aoi" value=<?= htmlspecialchars($user["aoi"]) ?>>
</td><</tr>
        
                
            </tbody>  
        </table>    
        <h5>Marks Obtained</h5>  

<table class="table table-dark table-striped table-bordered table-sm">
            <tbody>
            
        
        <tr>
        <td><label for = "cl_10" >CLass X</label></td>
        <!-- <label for = "aoi" >Area of Interest</label> -->
        <td>
        <input type ="number" min="0" max="10" step="0.1" id="cl_10" name = "cl_10" value=<?= htmlspecialchars($user["cl_10"]) ?>>
</td></tr>
<tr>
        <td><label for = "cl_12" >CLass XII</label></td>
        <!-- <label for = "aoi" >Area of Interest</label> -->
        <td>
        <input type ="number" min="0" max="10" step="0.1" id="cl_12" name = "cl_12" value=<?= htmlspecialchars($user["cl_12"]) ?>>
</td></tr>
<tr>
        <td><label for = "curr_cpi" >CPI</label></td>
        <!-- <label for = "aoi" >Area of Interest</label> -->
        <td>
        <input type ="number" min="0" max="10" step="0.01"  id="curr_cpi" name = "curr_cpi"  value=<?= htmlspecialchars($user["curr_cpi"]) ?>> <a href="cpi.php" class="btn btn-primary btn-sm" role="button">Calculate</a>
</td></tr>

</tbody>
</table>

<h5>Company Preference list</h5>  

<table class="table table-dark table-striped table-bordered table-sm">
            <tbody>
            
        
        <tr>
        <td><label for = "c1" >Choice I</label></td>
        <!-- <label for = "aoi" >Area of Interest</label> -->
        <td>
        <input type ="text" id="c1" name = "c1" value=<?= htmlspecialchars($user["c1"]) ?>>
</td></tr>
<tr>
        <td><label for = "c2" >Choice II</label></td>
        <!-- <label for = "aoi" >Area of Interest</label> -->
        <td>
        <input type ="text" id="c2" name = "c2" value=<?= htmlspecialchars($user["c2"]) ?>>
</td></tr>
<tr>
        <td><label for = "c3" >Choice III</label></td>
        <!-- <label for = "aoi" >Area of Interest</label> -->
        <td>
        <input type ="text" id="c3" name = "c3" value=<?= htmlspecialchars($user["c3"]) ?>>
</td></tr>

</tbody>
</table>
<h5>Documents</h5>  

<table class="table table-dark table-striped table-bordered table-sm">
            <tbody>
            
        
        <tr>
        <td><label for = "transcript" >Transcript(drive link)</label></td>
        <!-- <label for = "aoi" >Area of Interest</label> -->
        <td>
        <input type ="url" id="transcript" name = "transcript" value=<?= htmlspecialchars($user["transcript"]) ?>>
</td></tr></tbody></table>

<h5>Current Placement Status</h5>  

<table class="table table-dark table-striped table-bordered table-sm">
            <tbody>
            
        
        <tr>
        <td><label for = "place_stat" >Company (where placed)</label></td>
        <!-- <label for = "aoi" >Area of Interest</label> -->
        <td>
        <input type ="text" id="place_stat" name = "place_stat"  value=<?= htmlspecialchars($user["place_stat"]) ?> >
</td></tr>
<tr>
        <td><label for = "salary" >Salary </label></td>
        <!-- <label for = "aoi" >Area of Interest</label> -->
        <td>
        <input type ="number" step="1"  id="salary" name = "salary"  value=<?= htmlspecialchars($user["salary"]) ?> >
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

<input type="checkbox" name="checkbox_name" value="checkox_value" required> I hereby declare that all the information provided above is correct to the best of my knowledge.
        <br><br>

        <button class="button">Save Changes</button>

    </form>
    <a href="logout.php" class="button" role="button">Logout</a>

    <br>
    Return to <a href="home.php">HOME</a><br>
</body>
</html>