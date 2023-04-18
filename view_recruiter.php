<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="https://cdn.skypack.dev/-/sakura.css@v1.3.1-VmH2VZPA3IgYndF0s0Cx/dist=es2020,mode=raw/css/sakura.css"> -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<style>
    table {
		border-collapse: collapse;
		width: 100%;
		margin-bottom: 0px;
        border: 1px solid;
	}

	th, td {
		padding: 10px;
		text-align: left;
		border-bottom: 1px solid #ddd;
        border: 1px solid;
	}
  

	/* tr:hover {
      background-color: #f5f5f5;
    } */
    .jumbotron {
    background-color: #FAE6FA;
    color: black;
    align-self: center;
    margin-top: 50px;
    width: 50%;
    align-content: center;
    margin-left: 300px;
    border: 2px;
    padding:7px;
  }
	/* tr:hover {
      background-color: #f5f5f5;
    } */
	th {
		background-color: black;
		color: white;
		/* font-weight: bold;
		text-transform: uppercase; */
	}
    .search{
        margin-left:700px;
    }
    .box{
  align:right;
  margin-left:1200px;
}
  </style>
</head>
<body>
   
<div class="container">
<div class="jumbotron text-center">
<h2>Recruiter Details</h2>
</div>
</div>


<a href="tpo_home.php" class="btn btn-default" role="button"><span class="glyphicon glyphicon-home"></span> HOME</a>
<form method = "post" novalidate >
       
        <div class="box">
        <!-- <label for = "search" >Search</label> -->
        <input type ="text" id="search" name = "search"> <button class="btn btn-default btn-sm"><span class="glyphicon glyphicon-search"></span> Search </button>
        </div><br>

       

        

</form>
</body>
</html>


<?php
include 'connection.php';
$searchErr = '';
$employee_details='';

    if ($_SERVER["REQUEST_METHOD"] === "POST") 
    
    {
        
        $mysqli = require __DIR__ . "/connection.php";
        $search = $_POST['search'];
        // echo $search;
        // $stmt = $mysqli->prepare("select * from curr_student where roll_no like '%$search%'");
        // $stmt->execute();
        // $employee_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $mysqli = require __DIR__ . "/connection.php";
            $sql2 = "select * from com_post where name like \"%{$search}%\" or post like \"%{$search}%\" ;" ;
            $result = mysqli_query($mysqli,$sql2);
 
        echo "<table><tr><th>Roll_no</th><th>Post</th><th>Average Salary</th><th>Minimum CPI</th><th>Minimum Qualification</th></tr>";
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr><td>" .$row["name"]. "</td>";
        echo "<td>" .$row["post"]. "</td>";
        echo "<td>" .$row["avg_sal"]. "</td>";
        echo "<td>" .$row["min_cpi"]. "</td>";
        echo "<td>" .$row["min_qual"]. "</td>";
        

        echo "</tr>";
    
    }
    echo "</table>";
}
 

?>


    

    