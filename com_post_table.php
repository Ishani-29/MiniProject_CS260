<?php
session_start();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "yoo";
    
        foreach ($_POST as $k=>$r){
            echo $k;
            if(substr($k,0,1)=='!'){
                $mysqli = require __DIR__ . "/connection.php";
                $roll=substr($k,1,strlen($k)-1);
                $sql = "DELETE FROM com_post
                        WHERE id = $roll";
                        
                $result = $mysqli->query($sql);
                header("Location: com_post_table.php");
            }else if($k=="insert"){
                header("Location: admin_com_post_insert.php");
            }
            else{
             echo "<td><button name=\"".$roll."\" >EDIT</button></td>";
             
            session_start();
            session_regenerate_id();
            $_SESSION["id"] = $k;
            echo $_SESSION["id"];
            header("Location: admin_com_post_update.php");
            exit;   
            }
        }

        
} 
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Table</title>
</head>
<body>  
    <h1>COMPANIES AND POST</h1>  
<form method = "post" novalidate >
<button name="insert">INSERT NEW COMPANY POST</button></td>
<?php  


    echo "<table>";
    $mysqli = require __DIR__ . "/connection.php";
    $sql = "SELECT * FROM com_post;";
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
            
            $id=$row["id"];
            
            foreach ($row as $k=>$r){
                echo "<td>$r</td>";   
            }

            echo "<td><button name=\"".$id."\" >EDIT</button></td>";
            echo "<td><button name=\"!".$id."\" >DELETE</button></td>";
            echo "</tr>";
            
        }
       
        echo "</tbody></table>";
?>  
</form>
</body>
</html>