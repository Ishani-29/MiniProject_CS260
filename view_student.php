
    <!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="https://cdn.skypack.dev/-/sakura.css@v1.3.1-VmH2VZPA3IgYndF0s0Cx/dist=es2020,mode=raw/css/sakura.css"> -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>
   
<h1>TPO</h1>



<form method = "post" novalidate >
       
        <div>
        <!-- <label for = "search" >Search</label> -->
        <input type ="text" id="search" name = "search"><button>Search</button>
        </div>

       

        

</form>

    

    <table>
        <thead>
            <tr>
                <th>Roll_no</th>
                <th>cl_10</th>
                <th>cl_12</th>
                <th>curr_cpi</th>
                <th>age</th>
                <th>branch</th>
                <th>aoi</th>
                <th>batch_year</th>
                <th>c1</th>
                <th>c2</th>
                <th>c3</th>
                <th>place_stat</th>
                <th>salary</th>
                <th>transcript</th>
                <th>min_qual</th>
</tr>
</thead>
</table>
    
    <?php
    include 'connection.php';
    $searchErr = '';
    $employee_details='';
    
        if ($_SERVER["REQUEST_METHOD"] === "POST") 
        
        {
            // $mysqli = require __DIR__ . "/connection.php";
            $search = $_POST['search'];
            echo $search;
            // $stmt = $mysqli->prepare("select * from curr_student where roll_no like '%$search%'");
            // $stmt->execute();
            // $employee_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $mysqli = require __DIR__ . "/connection.php";
    $sql2 = "select * from curr_student where roll_no like \"%{$search}%\" or branch like \"%{$search}%\" or aoi like \"%{$search}%\" or c1 like \"%{$search}%\" or c2 like \"%{$search}%\" or c3 like \"%{$search}%\" or place_stat like \"%{$search}%\" or min_qual like \"%{$search}%\";" ;
                $result = $mysqli->query($sql2);
        
                // $user = $result->fetch_assoc();
            
    //         $stmt = $mysqli->prepare('select * from curr_student where roll_no like "%\"{$search}\"%" ;');
    //             // $stmt->bindValue(':domain_name', $domain);
    //             $stmt->execute();
    //             $resultSet = $stmt->get_result();
    // $data = $resultSet->fetch_all(MYSQLI_ASSOC);
    
            // echo $user['c1'];
             
        }
        else
        {
            $searchErr = "Please enter the information";
        }
        
    
     
    
    
    while($row=mysqli_fetch_assoc($result)){
    ?>
    <table class="table table-bordered table-sm">
        <tbody>
    <tr>
    
    
        <td><?php echo $row["roll_no"] ?></td> 
        <td><?php echo $row["cl_10"] ?></td>
        <td><?php echo $row["cl_12"] ?></td>
        <td><?php echo $row["curr_cpi"] ?></td>
        <td><?php echo $row["age"] ?></td>
        <td><?php echo $row["branch"] ?></td> 
        <td><?php echo $row["aoi"] ?></td>
        <td><?php echo $row["batch_year"] ?></td>
        <td><?php echo $row["c1"] ?></td>
        <td><?php echo $row["c2"] ?></td>
        <td><?php echo $row["c3"] ?></td> 
        <td><?php echo $row["place_stat"] ?></td>
        <td><?php echo $row["salary"] ?></td>
        <td><?php echo $row["transcript"] ?></td>
        <td><?php echo $row["min_qual"] ?></td>


        
    </tr>
    </tbody>
    </table>
    <?php } ?>
</body>
</html>