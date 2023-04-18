<?php

session_start();

 if (isset($_SESSION["id"])) {
    
    $mysqli = require __DIR__ . "/connection.php";
    
    $sql = "SELECT * FROM com_post
            WHERE id = {$_SESSION["id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}else{
    die("whaaaaaaaaaaaaaaaaat");

    exit;
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    if ($_POST["cl_10"]>100||$_POST["cl_10"]<0) {
        die("Enter Valid percentage in 10th");
    }

    if ($_POST["cl_12"]>100||$_POST["cl_12"]<0) {
        die("Enter Valid percentage in 12th");
    }
    if ($_POST["curr_cpi"]>10||$_POST["curr_cpi"]<0) {
        die("Enter Valid cpi");
    }

    
    if (strlen($_POST["password"]) < 8) {
        die("Password must be at least 8 characters");
    }
    
    if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
        die("Password must contain at least one letterr");
    }
    
    if ( ! preg_match("/[0-9]/", $_POST["password"])) {
        die("Password must contain at least one number");
    }


    $mysqli = require __DIR__ . "/connection.php";
    
    $sql = " UPDATE curr_student  SET cl_10={$_POST["cl_10"]} ,cl_12={$_POST["cl_12"]},curr_cpi={$_POST["curr_cpi"]} ,age = {$_POST["age"]}, aoi = \"{$_POST["aoi"]}\", 
                 c1 = \"{$_POST["c1"]}\", c2= \"{$_POST["c2"]}\", c3 = \"{$_POST["c3"]}\", place_stat = \"{$_POST["place_stat"]}\",
                 salary={$_POST["salary"]} , password=\"{$_POST["password"]}\"  WHERE roll_no=\"{$_SESSION["user_roll"]}\";" ;
     //don't add spacees in the \"
    if($_POST["place_stat"]==""){
        $sql2 = " UPDATE curr_student  SET cl_10={$_POST["cl_10"]} ,cl_12={$_POST["cl_12"]},curr_cpi={$_POST["curr_cpi"]} ,age = {$_POST["age"]}, aoi = \"{$_POST["aoi"]}\", 
        c1 = \"{$_POST["c1"]}\", c2= \"{$_POST["c2"]}\", c3 = \"{$_POST["c3"]}\", place_stat =NULL,
        salary=NULL , password=\"{$_POST["password"]}\"  WHERE roll_no=\"{$_SESSION["user_roll"]}\";" ;
        $mysqli->query($sql2);
    }else{
        $sql = " UPDATE curr_student  SET cl_10={$_POST["cl_10"]} ,cl_12={$_POST["cl_12"]},curr_cpi={$_POST["curr_cpi"]} ,age = {$_POST["age"]}, aoi = \"{$_POST["aoi"]}\", 
        c1 = \"{$_POST["c1"]}\", c2= \"{$_POST["c2"]}\", c3 = \"{$_POST["c3"]}\", place_stat = NULL,
        salary={$_POST["salary"]} , password=\"{$_POST["password"]}\"  WHERE roll_no=\"{$_SESSION["user_roll"]}\";" ;
          $mysqli->query($sql);
//don't add spacees in the \"   \"{$_POST["place_stat"]}\",
    }

    header("Location: curr_student_table.php");
    
    exit;    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design.css">
    <title>Update Account</title>
</head>
<body>
    <h1>Update POST</h1>


        <div>
        <p>Company: <?= htmlspecialchars($user["name"]) ?></p>
        </div>

        <div>
        <p> Branch :  <?= htmlspecialchars($user["post"]) ?></p>
        </div>

        <div>
        <p> Batch_year :<?= htmlspecialchars($user["batch_year"]) ?></p>
        </div>

        <div>
        <p> Qual :<?= htmlspecialchars($user["min_qual"]) ?></p>
        </div>



    <form method = "post" novalidate >


    <div>
            <label for = "cl_10" >CLass 10th</label>
            <input type ="number" min="0" max="10" step="0.1" id="cl_10" name = "cl_10" value=<?= htmlspecialchars($user["cl_10"]) ?>>
            </div>

        <div>

        <div>
            <label for = "cl_12" >CLass 12th</label>
            <input type ="number" min="0" max="100" step="0.1" id="cl_12" name = "cl_12" value=<?= htmlspecialchars($user["cl_12"]) ?>>
            </div>

        <div>
        <label for = "curr_cpi" >CPI</label>
        <input type ="number" min="0" max="10" step="0.01"  id="curr_cpi" name = "curr_cpi"  value=<?= htmlspecialchars($user["curr_cpi"]) ?> >
        </div>

        <div>
        <label for = "age" >AGE</label>
        <input type ="number" min="0" max="100" step="1" id="age" name = "age"  value=<?= htmlspecialchars($user["age"]) ?> >
        </div>

        <div>
        <label for = "aoi" >Area of Interest</label>
        <input type ="text" id="aoi" name = "aoi" value=<?= htmlspecialchars($user["aoi"]) ?>>
        </div>
        
        <h2>SELECT COMPANY OF Interest</h2>
        <div>   
        <label for = "c1" >1st choice of Preference</label>
        <input type ="text" id="c1" name = "c1" value=<?= htmlspecialchars($user["c1"]) ?>>
        </div>
        <div>
        <label for = "c2" >2nd choice of Preference</label>
        <input type ="text" id="c2" name = "c2" value=<?= htmlspecialchars($user["c2"]) ?>>
        </div>
        <div>
        <label for = "c3" >3rd choice of Preference</label>
        <input type ="text" id="c3" name = "c3" value=<?= htmlspecialchars($user["c3"]) ?>>
        </div>

        <br><br>
        <h2>if you are already placed then fill the given details below</h2>
        <div>
        <label for = "place_stat" >Company you are placed in</label>
        <input type ="text" id="place_stat" name = "place_stat"  value=<?= htmlspecialchars($user["place_stat"]) ?> >
        </div>
        <div>
        <label for = "salary" >Salary : </label>
        <input type ="number" step="1"  id="salary" name = "salary"  value=<?= htmlspecialchars($user["salary"]) ?> >
        </div>

        <h2> update password </h2>
        <div>
        <label for = "password" >Password</label>
        <input type ="text" id="password" name = "password"  value=<?= htmlspecialchars($user["password"]) ?> >
        </div>

        

        <button>Save Changes</button>

    </form>

    <br>
    return to <a href="curr_student_table.php">HOME</a><br>
</body>
</html>