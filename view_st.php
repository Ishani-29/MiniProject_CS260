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
		width: 2700px;
		margin-bottom: 0px;
        border: 1px solid;
	}

	th, td {
		padding: 10px;
		text-align: left;
		border-bottom: 1px solid #ddd;
        border: 1px solid;
	}
  
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
<h2>Current Batch Details</h2>
</div>
</div>


<a href="tpo_home.php" class="btn btn-default" role="button"><span class="glyphicon glyphicon-home"></span> HOME</a>
<form method = "post" novalidate >
       
        <div class="box">
        <!-- <label for = "search" >Search</label> -->
        <input type ="text" id="search" name = "search"> <button class="btn btn-default btn-sm"><span class="glyphicon glyphicon-search"></span> Search </button>
        </div><br>

       

        <!-- <button type="button" class="btn btn-default">
          <span class="glyphicon glyphicon-search"></span> Search
        </button> -->

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
            $sql2 = "select * from curr_student where roll_no like \"%{$search}%\" or branch like \"%{$search}%\" or aoi like \"%{$search}%\" or c1 like \"%{$search}%\" or c2 like \"%{$search}%\" or c3 like \"%{$search}%\" or place_stat like \"%{$search}%\" or min_qual like \"%{$search}%\";" ;
            $result = mysqli_query($mysqli,$sql2);
 
        echo "<table><tr><th>Roll_no</th><th>Class X</th><th>Class XII</th><th>Current CPI</th><th>Age</th><th>Branch</th><th>Area Of Interest</th><th>Batch Year</th><th>Company Preference-I</th><th>Company Preference-II</th><th>Company Preference-III</th><th>Comapany(where placed)</th><th>Salary</th><th>Transcript</th><th>Minimum Qualification</th></tr>";
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr><td>" .$row["roll_no"]. "</td>";
        echo "<td>" .$row["cl_10"]. "</td>";
        echo "<td>" .$row["cl_12"]. "</td>";
        echo "<td>" .$row["curr_cpi"]. "</td>";
        echo "<td>" .$row["age"]. "</td>";
        echo "<td>" .$row["branch"]. "</td>";
        echo "<td>" .$row["aoi"]. "</td>";
        echo "<td>" .$row["batch_year"]. "</td>";
        echo "<td>" .$row["c1"]. "</td>";
        echo "<td>" .$row["c2"]. "</td>";
        echo "<td>" .$row["c3"]. "</td>";
        echo "<td>" .$row["place_stat"]. "</td>";
        echo "<td>" .$row["salary"]. "</td>";
        echo "<td>" .$row["transcript"]. "</td>";
        echo "<td>" .$row["min_qual"]. "</td>";

        echo "</tr>";
    
    }
    echo "</table>";
}
 

?>


    

    