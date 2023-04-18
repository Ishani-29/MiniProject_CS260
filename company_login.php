<?php
$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/connection.php";
    
    $sql = sprintf("SELECT * FROM com_post
                    WHERE name = '%s'",
                   $mysqli->real_escape_string($_POST["company_name"]));

    $sql2 = sprintf("SELECT * FROM company WHERE name = '%s'", $mysqli->real_escape_string($_POST["company_name"]));
    
    $result = $mysqli->query($sql);

    $res = $mysqli->query($sql2);
    
    $user = $result->fetch_assoc();

    $comp = $res->fetch_assoc();

    
    if ($user) {
        if ($comp["password"] === $_POST["password"]){

            session_start();
            session_regenerate_id();
            $_SESSION["company_name"] = $user["name"];
            $_SESSION["password"] = $comp["password"];
            header("Location: post_company.php");

            exit;
        }
    }
    echo '<script>alert("Login Failed, TRY AGAIN!");
    window.location.href="company_login.php";
    </script>';
    $is_invalid = true;
}

    ?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design.css">
    <title>LogIn</title>
</head>
<body>
   
<h1>Log-In</h1>



<form method = "post" novalidate >
       
        <div>
        <label for = "company_name" >Company Name</label>
        <input type ="text" id="company" name = "company_name">
        </div>

        <div>
        <label for = "password" >Password</label>
        <input type ="password" id="password" name = "password">
        </div>

        <button>Log-In</button>

    </form>
</body>
</html> -->

    <!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Company Register page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
  .jumbotron {
    background-color: #52b2bf;
    color: #fff;
    /* align-self: center; */
    margin-top: 100px;
    width: 30%;
    align-content: center;
    border-radius: 0;
    /* margin-left: 400px; */
  }

  .jumbotron-special{
    padding:2px;
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
    <div class="row">
      <div class="container">
      <div class="jumbotron jumbotron-special text-left col-md-6">
          
          <img src="com1.jpg" width="600px" margin-top="100px" height="500px">
    </div>


    <div class="jumbotron text-center col-md-6">
       <h1>Recruiter</h1> 
      <p><h6>Login to IIT Patna Placement Portal</h6></p> <br>
      <form method = "post" novalidate >
       
            
          <input type="text" padding-left="10px" width = "70%" id = "company" name="company_name" class="form-control" size="50" placeholder="Company Name" required><br>
          <input type="password" id = "password" class="form-control" size="50" name="password" placeholder="Password" required><br>
          <!-- <input type="password" id = "c_password" class="form-control" size="50" placeholder="Confirm Password" required> -->
          
          
            <br><br>
            <button type="submit" class="button">Log-in</button><br><br>
            <!-- <a href="update.php" class="button" role="button" width="50%">Login</a><br><br> -->
            Don't have an account?<a href="company.html" class="mt-3">Register</a>
         
        
      </form>
    </div>
    </div>
    </div>
    
    </body>
    </html>
