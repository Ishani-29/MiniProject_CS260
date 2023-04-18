

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>Document</title>
    <style>
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
  </style>
  </head>
<body>
<div class="container">
<div class="jumbotron text-center">
   <h3>TERMINAL</h3></div></div>
<form method = "post" novalidate >
       
<!-- <label for="q">query:</label> -->

<textarea id="q" name="q" rows="4" cols="100">
</textarea><br>
      <div class="b"><button class="btn btn-primary btn-center">Execute</button></div>



   </form>
</body> 
</html>
<!-- <table> -->
<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $s= $_POST['q'];
    // echo $s."<br>";
    
    $mysqli = require __DIR__ . "/connection.php";

    if($mysqli->query($s)){
        echo "Query executed successfully";
    }
    else{
        echo "Wrong query";
    }
   
    // echo "<thead><tr>";
    // if($row=mysqli_fetch_assoc($result)){
    //     echo $row;
    //     foreach ($row as $k=>$r){
    //         echo "<th>".$k."</th>";
    //     }
    // }
    //  echo "</tr></thead><tbody>";
      
    //  $s1= $_POST['q'];
    //  $mysqli = require __DIR__ . "/connection.php";
 
    //  $result1 = $mysqli->query($s1);
    //  echo "<tr>";
    //     while($row=mysqli_fetch_assoc($result1)){
    //         foreach ($row as $k=>$r){
    //             echo "<td>".$r."</td>";
    //         }

    //         echo "</tr>";
    //     }
    //     echo "</tbody></table>";
    }


?>  




