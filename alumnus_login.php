<?php
$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/connection.php";
    
    $sql = sprintf("SELECT * FROM alumnus
                    WHERE roll_no = '%s'",
                   $mysqli->real_escape_string($_POST["roll_no"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

    // print_r($user);
    echo '<script>alert("Login Failed, TRY AGAIN!");
    window.location.href="alumnus_login.php";
    </script>';
    
    if ($user) {
        if ($user["password"] === $_POST["password"]){

            session_start();
            session_regenerate_id();
            $_SESSION["user_roll"] = $user["roll_no"];
            header("Location: alumnus_home.php");

            exit;
        }
    }
    $is_invalid = true;
}

?>






    <!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>alumnus Register page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
  .jumbotron {
    background-color: #A420D0;
    color: #fff;
    /* align-self: center; */
    margin-top: 100px;
    width: 30%;
    align-content: center;
    border-radius: 0;
    /* margin-left: 400px; */
  }

  .jumbotron-special{
    padding:10px;
    background-color: white;
    border:1px solid #ccc;
  }


  .button {
  background-color: #392A48;
  border: none;
  color: white;
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
.container{
    
    display: flex;
}
  </style>
</head>

<body style="background-color: #E6E6FA;">

<?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>
<div class="row">
  <div class="container">
  <div class="jumbotron jumbotron-special text-left col-md-6">
      
      <img src="picture.jpg">
</div>
    <div class="jumbotron text-center col-md-6">
      <h1>Alumnus</h1> 
      <p><h6>Login to IIT Patna Placement Portal</h6></p> <br>
      <form method = "post" novalidate >
       
            
      <input type="text" padding-left="10px" width = "70%" id = "roll_no" name="roll_no" class="form-control" size="50" placeholder="Roll No." required><br>
          <input type="password" id = "password" class="form-control" size="50" name="password" placeholder="Password" required><br>
          <!-- <input type="password" id = "c_password" class="form-control" size="50" placeholder="Confirm Password" required> -->
          
          
            <br><br>
            <button type="submit" class="button">Log-in</button><br><br>
            <!-- <a href="update.php" class="button" role="button" width="50%">Login</a><br><br> -->
           
         
        
      </form>
    </div>
 
</div>
</div>
    
    </body>
    </html>