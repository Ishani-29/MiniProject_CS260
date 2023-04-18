<?php

session_start();

// print_r($_SESSION);
$c=$_SESSION["company_name"];

$p=$_SESSION["password"];
 if (isset($_SESSION["company_name"])) {

    $mysqli = require __DIR__ . "/connection.php";

}else{
    header("Location: company_login.php");

    exit;
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="https://cdn.skypack.dev/-/sakura.css@v1.3.1-VmH2VZPA3IgYndF0s0Cx/dist=es2020,mode=raw/css/sakura.css"> -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <style>
  .jumbotron {
    background-color: #C6E6FB;
    color: black;
    align-self: center;
    margin-top: 50px;
    width: 70%;
    align-content: center;
    margin-left: 200px;
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
  width: 40%;
  border-radius: 5px;
}
  </style>

</head>
<body>
<div class="container">
<div class="jumbotron text-center">

    
    <?php  
    $mysqli = require __DIR__. "/connection.php";
    $r = htmlspecialchars($_SESSION["company_name"]);
    echo "<h1>" ."$r". "</h1><br>";
    // echo"<h3>HOME</h3><br><br>";
    $sql = "SELECT * FROM com_post WHERE name = \"{$_SESSION["company_name"]}\";";
    $sql2 = "delete from com_post where avg_sal IS NULL;";
    $sql3="SELECT * FROM company WHERE name = \"{$_SESSION["company_name"]}\";";
    $mysqli->query($sql2);
    $res = $mysqli->query($sql3);
    $result = $mysqli->query($sql);
    while($roww=mysqli_fetch_assoc($res)){
    ?>
    
    <div>
        <b>
        Mode of Interview = <?php echo $roww["modei"] ?>
        <br>
        Mode of Test = <?php echo $roww["modet"] ?>
        <br><br></b>
    </div>
    <?php
    }
    while($row=mysqli_fetch_assoc($result)){
    ?>
    <table class="table table-dark table-striped table-bordered table-sm">
    <tr>
        <td>Post</td>
        <td><?php echo $row["post"] ?></td> 
    </tr>
    <tr>
        <td>Min CPI</td>
        <td><?php echo $row["min_cpi"] ?></td>
        <!-- <th>Avg Salary</th> -->
        
    </tr>
    <tr>
        <td>Avg Salary</td>
        <td><?php echo $row["avg_sal"] ?></td>
    </tr>
    <tr>
    <td>Min Qual</td>
    <td><?php echo $row["min_qual"] ?></td>

        <!-- <th><?php echo $row["post"] ?></th> 
        <th><?php echo $row["min_cpi"] ?></th>
        <th><?php echo $row["avg_sal"] ?></th> -->
        
    </tr>
    </table>
    <form action = "delete_post.php" novalidate>
        <button type = "submit" name = "id" value = <?= htmlspecialchars($row["post"]) ?>><span class="glyphicon glyphicon-trash"></span></button>
    </form><br>
    <br>
    <?php } ?>
<!--     
    <h2>New post?</h2>  -->
    <form method = "post" action="post_fill.php" novalidate >
        <button class="button">Add New post</button>
    </form>
    <a href="eligible_stud.php" class="button" role="button">View Eligible Students</a><br>

    <a href="alumnus_logout.php" class="button" role="button">Logout</a>
    
</body>
</html>