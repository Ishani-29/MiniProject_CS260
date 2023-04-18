<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "yoo";
    
        foreach ($_POST as $k=>$r){
            echo $k;
            if(substr($k,0,1)=='!'){
                $mysqli = require __DIR__ . "/connection.php";
                $roll=substr($k,1,8);
                $sql = "DELETE FROM curr_student
                        WHERE roll_no = \"{$roll}\"";
                        
                $result = $mysqli->query($sql);
                header("Location: curr_student_table.php");
            }else if($k=="insert"){
                header("Location: admin_curr_student_insert.php");
            }
            else{
             echo "<td><button name=\"".$roll."\" >EDIT</button></td>";
             
            session_start();
            session_regenerate_id();
            $_SESSION["user_roll"] = $k;
            echo $_SESSION["user_roll"];
            header("Location: admin_curr_student_update.php");
            exit;   
            }
        }

        
} 
?>
    
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
<h2>Current Student Table</h2>
</div>
</div>

<a href="admin.php" class="btn btn-default" role="button"><span class="glyphicon glyphicon-home"></span> HOME</a><br><br>
<form method = "post" novalidate ><button name="insert" class="btn btn-primary">INSERT NEW STUDENT </button> </td><br><br>
<?php  


echo "<table> ";
    $mysqli = require __DIR__ . "/connection.php";
    $sql = "SELECT * FROM curr_student;";
    $result = $mysqli->query($sql);

    echo "<thead><tr>";
    if($row=mysqli_fetch_assoc($result)){
     
        foreach ($row as $k=>$r){
            echo "<th>".$k."</th>";
        }
    }
     echo "</tr></thead><tbody>";
     $result1 = $mysqli->query($sql);

        while($row=mysqli_fetch_assoc($result1)){
            echo "<tr>";
            $roll=$row["roll_no"];
            foreach ($row as $k=>$r){
                echo "<td>$r</td>";   
            }
?>
            <td><button class="btn btn-primary" name=<?= htmlspecialchars($roll)?>>EDIT</button></td>
            <td><button class="btn btn-danger" name=<?= htmlspecialchars($roll)?>>DELETE</button></td>
            <?php
        }
       
        echo "</tbody></table>";
?>  
</form>
</body>
</html>