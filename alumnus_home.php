<?php

session_start();

// print_r($_SESSION);

 if (isset($_SESSION["user_roll"])) {
    
    $mysqli = require __DIR__ . "/connection.php";
    
    $sql = "SELECT * FROM alumnus
            WHERE roll_no = \"{$_SESSION["user_roll"]}\";";
            
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
  width: 40%;
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
    <h1>Welcome</h1><br><br>
        <h1><p><?= htmlspecialchars($user["roll_no"]) ?></p></h1>
        
        <p><a href="alumnus_profile.php">View Profile</a></p>
        
        <p><a href="alumnus_update.php">Update Account</a></p>

        <form action="logout.php" >
            <button class="button"> LOG-OUT </button>
        </form>
        
        
    <?php else: ?>
        
        <p><a href="alumnus_login.php">Log in</a></p>
        
    <?php endif; ?>
    </div>
    
</body>
</html>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    