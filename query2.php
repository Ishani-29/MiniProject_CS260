

<!DOCTYPE html>
<html lang="en">
    <head>
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
    background-color: white;
    color: black;
    align-self: center;
    margin-top: 50px;
    width: 20%;
    align-content: center;
    margin-left: 420px;
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
textarea {
  width: 80%;
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #2c2c2c;
  font-size: 16px;
  color:#03c04a;
  resize: none;
  margin-left:100px;
}
.b{
    text-align:center;
}
.head{
    align:center;
}
  </style>
  </head>
<body>
<div class="container">
  <div class="jumbotron jumbotron-special text-left col-md-6">
   <h3>TERMINAL</h3></div></div>
<form method = "post" novalidate >
       
<!-- <label for="q">query:</label> -->
<br><br>
<textarea id="q" name="q" rows="4" cols="100">
</textarea><br>
      <div class="b"><button class="btn btn-primary btn-center">Execute</button></div>

   </form>
</body> 
<br><br>
<table>
<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $s= $_POST['q'];
    // echo $s."<br>";
    $mysqli = require __DIR__ . "/connection.php";

    $result = $mysqli->query($s);
   
    echo "<thead><tr>";
    if($row=mysqli_fetch_assoc($result)){
     
        foreach ($row as $k=>$r){
            echo "<th>".$k."</th>";
        }
    }
     echo "</tr></thead><tbody>";
      
     $s1= $_POST['q'];
     $mysqli = require __DIR__ . "/connection.php";
 
     $result1 = $mysqli->query($s1);
     echo "<tr>";
        while($row=mysqli_fetch_assoc($result1)){
            foreach ($row as $k=>$r){
                echo "<td>".$r."</td>";
            }

            echo "</tr>";
        }
        echo "</tbody></table>";
    }

   
?>  




</body>
</html>