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
            $sql2 = "select * from curr_student where roll_no like \"%{$search}%\";" ;
            $result = $mysqli->query($sql2);
    
            $user = $result->fetch_assoc();
        
//         $stmt = $mysqli->prepare('select * from curr_student where roll_no like "%\"{$search}\"%" ;');
//             // $stmt->bindValue(':domain_name', $domain);
//             $stmt->execute();
//             $resultSet = $stmt->get_result();
// $data = $resultSet->fetch_all(MYSQLI_ASSOC);

        print_r ($user);
         
    }
    else
    {
        $searchErr = "Please enter the information";
    }
    

 

?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design.css">
    <title>LogIn</title>
</head>
<body>
   
<h1>TPO</h1>



<form method = "post" novalidate >
       
        <div>
        <!-- <label for = "search" >Search</label> -->
        <input type ="text" id="search" name = "search"><button>Search</button>
        </div>

       

        

    </form>

    <table class="table">
        <thead>
          <tr>
          <!-- <th>#</th> -->
            <th>roll_no</th>
            <th>cl_10</th>
            <th>cl_12</th>
            <th>branch</th>
            <th>aoi</th>
            <th>batch_year</th>
            <th>c1</th>
            <th>c2</th>
            <th>c3</th>
            <th>place_stat</th>
            <th>salary</th>
            <th>transcript</th>
            <th>aoi</th>
            <th>min_qual</th>
          </tr>
        </thead>
        <tbody>
                <?php
                 if(!$user)
                 {
                    echo '<tr>No data found</tr>';
                 }
                 else{
                    foreach($user as $key=>$value)
                    {
                        extract($user);
                        ?> 
                    <tr>
                       
                        <td><?php echo $key;?></td>
                        <td><?php echo $value['cl_10'];?></td>
                        <td><?php echo $value['cl_12'];?></td>
                        <td><?php echo $value['curr_cpi'];?></td>
                        <td><?php echo $value['age'];?></td>
                        <td><?php echo $value['branch'];?></td>
                        <td><?php echo $value['aoi'];?></td>
                        <td><?php echo $value['batch_year'];?></td>
                        <td><?php echo $value['c1'];?></td>
                        <td><?php echo $value['c2'];?></td>
                        <td><?php echo $value['c3'];?></td>
                        <td><?php echo $value['place_stat'];?></td>
                        <td><?php echo $value['salary'];?></td>
                        <td><?php echo $value['transcript'];?></td>
                        <td><?php echo $value['min_qual'];?></td>
                    </tr>
                         
                        <?php
                    }
                     
                 }
                ?>
             
         </tbody>
      </table>
</body>
</html>