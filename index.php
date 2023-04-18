<!DOCTYPE html>
<html lang="en">
<head>
  <title>Homepage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      margin-top: 10;
      border-radius: 0;
      background-color: #392A48;
      color: white;
      text: size 10px;
    }
    .intro{
        font: size 20px;
        margin-left:30px;
        font-family: georgia, serif;
        padding-left:20px;
    }
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #FAE6FA;
      height: 100%;
      width: 250px;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #392A48;
      color: white;
      padding: 3px;

    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: 100%;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
    .img-responsive{
        margin:10px 0;
    }
    img{
        float: left;
    }
    .text{
        padding-left: 30px;
        float: left;
        color: white;
        font-family: georgia, serif;
    }
    .bar{
      color: black;
    }
    .button {
  background-color: #52b2bf;
  border: none;
  color: black;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  cursor: pointer;
  width: 70%;
  border-radius: 0px;
}
.jumbotron {
    background-color: #c0c0c0;
    color: #fff;
    align-self: center;
    margin-top: 10px;
    width: 90%;
    align-content: center;
    margin-left: 50px;
    border-radius: 0;
  }
  .carousel .item {
  height: 550px;
}
.item img {
    position: absolute; 
    top: 0;
    left: 0;
    min-height: 550px;
}

  </style>
</head>

<body style="background-color:#FAE6FA;">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <!-- <a class="navbar-brand" href="#">Logo</a> -->
      <img class ="img-responsive" width = "8%" src="https://upload.wikimedia.org/wikipedia/en/thumb/5/52/Indian_Institute_of_Technology%2C_Patna.svg/1200px-Indian_Institute_of_Technology%2C_Patna.svg.png">
      <br>
      <div class="text">
      <h1><b> Placements, IIT Patna</b></h1>
</div>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <p class="bar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
</p>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="SignUp.php"><span class="glyphicon glyphicon-log-in"></span> Register</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        
      </ul>
    </div>
  </div>
</nav>
 
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-lg-10 sidenav"> <br><br><br>
    <b><a href="gt.php" class="button" role="button" width="50%">General Trends</a><br><br></b>
    <b><a href="login.php" class="button" role="button" width="50%">Student</a><br><br></b>
    <b><a href="company_login.php" class="button" role="button" width="50%">Recruiter</a><br><br></b>
    <b><a href="alumnus_login.php" class="button" role="button" width="50%">Alumnus</a><br><br></b>
    <b><a href="tpo_login.php" class="button" role="button" width="50%">TPO</a><br><br></b>
    <b><a href="admin_login.php" class="button" role="button" width="50%">System Admin</a><br><br></b>
    <!-- <a href="login.php">Student</a></p>
    <a href="company_login.php">Recruiter</a></p>
    <a href="alumnus_login.php">Alumnus</a></p> -->
    <!-- <a href="login.php">Login</a></p>
    <a href="signup.html">Sign Up</a></p> -->
    <!-- <a href="company_login.php">Company</a></p>
    <a href="alumnus.html">Alumnus</a></p> -->
      <!-- <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p> -->
    </div>
    <div class="col-sm-8 text-center"> 
        <br>
        
     
      <p class = "intro"><h4><b>Welcome to the recruitment website For IIT Patna!</b></h4></p>
<!-- <blockquote><p>IIT is India's foremost industrial leadership development institution. Our Graduates are a combination of rigorous thinking, hardwork and fundamental stronghold. They are nurtured by the institute to strive for excellence and deliver impact in their field of work. Let us begin...</p></blockquote> -->
      
      <!-- <div class="jumbotron text-center">
      <div class="text-center">
        
        <a href="#" class="button" role="button" width="50%">General Trends</a><br>
      <a href="login.php" class="button" role="button" width="50%"><span class ="glyphicon glyphicon-user"> Student</span></a><br>
      <a href="company_login.php" class="button" role="button" width="50%">Recruiter</a><br>
      <a href="alumnus_login.php" class="button" role="button" width="50%">Aluminus</a>
</div>
</div> -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="pict.jpg" class="img-fluid" height = "20" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="pict2.jpg" class="img-fluid" height = "20" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="pict3.jpg" class="img-fluid" height = "20" alt="New york" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
    </div>
    <br><br><br>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p>NOTICE</p>
      </div>
      <div class="well">
        <p>NOTICE</p>
      </div>
    </div>
  </div>
</div>
<br>
<footer class="container-fluid text-center">
  <p>Copyright © Indian Institute of Technology Patna</p>
</footer>

</body>
</html>
    
    
    
    
    
    
    
    
    
    