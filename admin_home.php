<?php

session_start();

// print_r($_SESSION);

 if (isset($_SESSION["id"])) {
    
    $mysqli = require __DIR__ . "/connection.php";
    
    $sql = "SELECT * FROM tpo
            WHERE id = \"{$_SESSION["id"]}\";";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}



?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<style>
     .jumbotron {
    background-color: #392A48;
    color: #fff;
    align-self: center;
    margin-top: 150px;
    width: 30%;
    align-content: center;
    margin-left: 550px;
    height:100%;
    padding: 5em inherit;
    min-height: 300px;
    /* background-position-x: 50%; */
  background-position-y: cover;
  background-size: cover;
  }

  .button {
  background-color: #white;
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
body {
  background-image: url("picture2.jpg");
  background-size: cover;
}
a { color: white; }
  </style>

  <body style="background-color: #FAE6FA;">
    
    

   <?php if (isset($user)): ?>
    
    <div class="jumbotron text-center">
    <h1>Welcome!</h1><br><br>
        <h1><p><?= htmlspecialchars($user["id"]) ?></p></h1>
        
        <p><u><a href=".php">View Current Batch</a></u></p>
        
        <p><u><a href="view_recruiter.php">View Recruiters</a></u></p>
        <p><u><a href="view_alumnus.php">View Alumni</a></u></p>


        <form action="logout.php" >
            <button class="btn btn-primary"> LOG-OUT </button>
        </form>
        
        
    <?php else: ?>
        
        <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
        
    <?php endif; ?>
    </div>
    
</body>
</html>
    
    
    
    
    
    
    
    
    
    
    