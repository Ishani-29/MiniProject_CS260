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
    <p class="head"><h1>LIST OF ELIGIBLE COMPANIES</h1></p>


<?php

session_start();

// print_r($_SESSION);

 if (isset($_SESSION["user_roll"])) {
    
    $mysqli = require __DIR__ . "/connection.php";
    
    // echo  $_SESSION["user_roll"];


    $sql = "SELECT place_stat,aoi,curr_cpi FROM curr_student
            WHERE roll_no = \"{$_SESSION["user_roll"]}\"";
            
    $result = $mysqli->query($sql); 
    $user = $result->fetch_assoc();
    ?>
    <!-- // echo "yoop";

    //  echo $user['place_stat'];
    //  echo $user['aoi'];
    //  echo $user["curr_cpi"]; -->
     <br>
    <!-- // // print_r($user);  -->
    <?php  
    if($user==""){  
        $user=NULL;
    } 
    $sql3 = "SELECT name FROM com_post
            WHERE name != \"{$user['place_stat']}\" and post =\"{$user["aoi"]}\" and min_cpi<= {$user['curr_cpi']}";
    
    $res4 = $mysqli->query($sql3);
    ?>
       <table class="table table-bordered table-striped table-dark">
        <?php while($row=mysqli_fetch_assoc($res4)){ ?>
            <tr><td>
            <?php echo $row['name'] ?>
        </td></tr>
        <?php } ?>      
        </table>
    
    
    <?php
}else{
    die("whaaaaaaaaaaaaaaaaat");

    exit;
}

?>
<a href="home.php" class="button" role="button">RETURN</a>

</div>
</div>
</body>
</html>
