<?php
session_start();

if (isset($_SESSION["user_roll"])) {
    
    $mysqli = require __DIR__ . "/connection.php";
    
    $sql = "SELECT * FROM curr_student
            WHERE roll_no = \"{$_SESSION["user_roll"]}\"";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}else{
    die("error");

    exit;
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
$mysqli = require __DIR__ ."/connection.php";
$sql2 = "INSERT INTO cpi(s1,cr1,s2,cr2,s3,cr3,s4,cr4,s5,cr5,s6,cr6) values(?,?,?,?,?,?,?,?,?,?,?,?); ";


$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql2)) {
    echo "SQL error: " . $mysqli->error ;
}

$stmt->bind_param("dddddddddddd",
                  $_POST["s1"],$_POST["cr1"],$_POST["s2"],$_POST["cr2"],$_POST["s3"],$_POST["cr3"],$_POST["s4"],$_POST["cr4"],$_POST["s5"],$_POST["cr5"],$_POST["s6"],$_POST["cr6"]);

// if($stmt->execute()){
    $stmt -> execute();
   

$var1=$_POST["cr1"]*$_POST["s1"];
$var2=$_POST["cr2"]*$_POST["s2"];
$var3=$_POST["cr3"]*$_POST["s3"];
$var4=$_POST["cr4"]*$_POST["s4"];
$var5=$_POST["cr5"]*$_POST["s5"];
$var6=$_POST["cr6"]*$_POST["s6"];

$s=$var1+$var2+$var3+$var4+$var5+$var6;

$d=$_POST["cr1"]+$_POST["cr2"];
$d1=$d+$_POST["cr3"];
$d2=$d1+$_POST["cr4"];
$d3=$d2+$_POST["cr5"];
$d4=$d3+$_POST["cr6"];

$cpi=$s/$d4;
echo $cpi;
$sql1 = " UPDATE curr_student  SET curr_cpi=round({$cpi},1) WHERE roll_no=\"{$_SESSION["user_roll"]}\";" ;

$mysqli->query($sql1);

    header("Location: update.php");
    
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
    width: 40%;
    align-content: center;
    margin-left: 300px;
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
  width: 30%;
  border-radius: 5px;
}
  </style>
</head>
<body>
<div class="container">
<div class="jumbotron text-center">
    <h3>CPI CALCULATOR</h3>
<form method = "post" novalidate >
<table class="table table-dark table-striped table-bordered table-sm">
        <tbody>
       <tr>
<td><label for = "age" >SEM-I SPI</label</td>  
<td><input type ="number" min="0" max="10" step="0.01" id="s1" name = "s1" placeholder="s1" required  ><br><br></td>
</tr>
<tr>
<td><label for = "age" >SEM-I CREDITS</label</td>
<td><input type ="number" min="0" max="100" step="1" id="cr1" name = "cr1"  placeholder="cr1" required  ><br><br></td>
</tr>
<tr>
<td><label for = "age" >SEM-II SPI</label</td>        
<td><input type ="number" min="0" max="10" step="0.01" id="s2" name = "s2"  placeholder="s2" required  ><br><br></td>
</tr>
<tr>
<td><label for = "age" >SEM-II CREDITS</label</td>
<td><input type ="number" min="0" max="100" step="1" id="cr2" name = "cr2"  placeholder="cr2" required ><br><br><t/td>
</tr>
<tr>
<td><label for = "age" >SEM-III SPI</label</td>        
<td><input type ="number" min="0" max="10" step="0.01" id="s3" name = "s3"  placeholder="s3" required ><br><br></td>
</tr>
<tr>
<td><label for = "age" >SEM-III CREDITS</label</td>
<td><input type ="number" min="0" max="100" step="1" id="cr3" name = "cr3"  placeholder="cr3" required  ><br><br></td>
</tr>
    <tr>
    <td><label for = "age" >SEM-IV SPI</label</td>
<td><input type ="number" min="0" max="10" step="0.01" id="s4" name = "s4" placeholder="s4" required  ><br><br></td>
</tr>
<tr>
<td><label for = "age" >SEM-IV CREDITS</label</td>
<td><input type ="number" min="0" max="100" step="1" id="cr4" name = "cr4"  placeholder="cr4" required  ><br><br></td>
</tr>
<tr>
<td><label for = "age" >SEM-V SPI</label</td>
            
<td><input type ="number" min="0" max="10" step="0.01" id="s5" name = "s5"  placeholder="s5" required  ><br><br></td>
</tr>
<tr>
<td><label for = "age" >SEM-V CREDITS</label</td>
<td><input type ="number" min="0" max="100" step="1" id="cr5" name = "cr5"  placeholder="cr5" required ><br><br></td>
</tr>
<tr>
<td><label for = "age" >SEM-VI SPI</label</td>
            
<td><input type ="number" min="0" max="10" step="0.01" id="s6" name = "s6"  placeholder="s6" required ><br><br></td>
</tr>
<tr>
<td><label for = "age" >SEM-VI CREDITS</label</td>
<td><input type ="number" min="0" max="100" step="1" id="cr6" name = "cr6"  placeholder="cr6" required  ><br><br></td>
</tr>
</tbody>
</table>

      
     
       
         
         <button type="submit" class="btn btn-primary">Calculate</button><br><br>
         <!-- <a href="update.php" class="button" role="button" width="50%">Login</a><br><br> -->
    <a href="update.php" class="mt-3"><u>RETURN</u></a>
      
     
   </form>
</div>
</div>
</body>
</html>