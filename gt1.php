<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="design.css">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="design.css">

    <?php if ($_SERVER["REQUEST_METHOD"] === "POST") : ?>
    <script type="text/javascript" src="chart.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['company', 'placements'],
         <?php
        
        $mysqli = require __DIR__ . "/connection.php";
        $y1=$_POST["batch_year"];
        $sql1 = "SELECT count(roll_no) as number,place_stat from student where batch_year=\"{$y1}\" group by place_stat order by number desc";
       
        
        $result = $mysqli->query($sql1);
        while($row=mysqli_fetch_assoc($result)){
            echo "['".$row['place_stat']."',".$row['number']."],";
        
        }        
         ?>
        
        ]);
      
          var options = {
          <?php
          $ye1=$_POST["batch_year"];
          $t1="COMPANY PLACEMENT STATS ".strval($ye1);
          echo "title:'".$t1."'";
          ?>
          }
        var chart = new google.visualization.PieChart(document.getElementById('c_place'));
        chart.draw(data, options);
      };

    </script>
<?php endif; ?>


<?php if ($_SERVER["REQUEST_METHOD"] === "POST") : ?>
    <script type="text/javascript" src="chart.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Post', 'Placements'],
         <?php
        
        $mysqli = require __DIR__ . "/connection.php";
        $y2=$_POST["batch_year"];
        $sql2= "SELECT count(roll_no) as number,aoi from student where batch_year={$y2} group by aoi order by number desc";
        
        $result = $mysqli->query($sql2);
       
        while($row=mysqli_fetch_assoc($result)){
            echo "['".$row['aoi']."',".$row['number']."],";
        
        }        
         ?>
        
        ]);
      
          var options = {
          <?php
          $ye2=$_POST["batch_year"];
          $t2="POST: PLACEMENT STATS ".strval($ye2);
          echo "title:'".$t2."'";
          ?>
          };
        var chart = new google.visualization.PieChart(document.getElementById('p_place'));
        chart.draw(data, options);
      }


    </script>
<?php endif; ?>


<?php if ($_SERVER["REQUEST_METHOD"] === "POST") : ?>
    <script type="text/javascript" src="chart.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Company', 'Salary',{ role: 'annotation' }],
        <?php
        $mysqli = require __DIR__ . "/connection.php";
        $y=$_POST["batch_year"];
        $sql = "SELECT round(avg(salary),0) as avg,place_stat from student where batch_year= {$y} group by place_stat order by avg ;";
            
        $result = $mysqli->query($sql);
       
        while($row=mysqli_fetch_assoc($result)){
            echo "['".$row['place_stat']."',".$row['avg'].",'".$row['avg']."'],";
        }        
          ?>
        ]);
      
          var options = {
            <?php
          $ye2=$_POST["batch_year"];
          $t2="COMPANY PACKAGES of ".strval($ye2);
          echo "title:'".$t2."',";
          ?>
          width: 600,
          height: 400,
          backgroundColor: '#87CEEB'
          };

          var chart = new google.charts.Bar(document.getElementById('c_high'));
          chart.draw(data, google.charts.Bar.convertOptions(options));
        }


    </script>
<?php endif; ?>

<?php if ($_SERVER["REQUEST_METHOD"] === "POST") : ?>
    <script type="text/javascript" src="chart.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Branch', 'Avg-Salary', {role:'style'}],
        <?php
         $mysqli = require __DIR__ . "/connection.php";
         $y=$_POST["batch_year"];
         $sql = "SELECT avg(salary) as avg,branch from student where batch_year=\"{$y}\" group by branch order by avg desc"; 
         $result = $mysqli->query($sql);
       
        while($row=mysqli_fetch_assoc($result)){
            echo "['".$row['branch']."',".$row['avg'].",'color:#392A48'],";
        }        
          ?>
        ]);
      
          var options = {
            <?php
          $ye2=$_POST["batch_year"];
          $t2="AVG Package of each branch ".strval($ye2);
          echo "title:'".$t2."',";
          ?>
          width: 600,
          height: 400,
          backgroundColor: '#87CEEB'
          };

          var chart = new google.charts.Bar(document.getElementById('b_high'));
          chart.draw(data, google.charts.Bar.convertOptions(options));
        }


    </script>
<?php endif; ?>

<?php if ($_SERVER["REQUEST_METHOD"] === "POST") : ?>
    <script type="text/javascript" src="chart.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Branch', 'Max-Salary'],
        <?php
         $mysqli = require __DIR__ . "/connection.php";
         $y=$_POST["batch_year"];
         $sql = "SELECT max(salary) as max_offer,branch from student where batch_year={$y} group by branch;";
                            
         $result = $mysqli->query($sql);
       
        while($row=mysqli_fetch_assoc($result)){
            echo "['".$row['branch']."',".$row['max_offer']."],";
        }        
          ?>
        ]);
      
          var options = {
            <?php
          $ye2=$_POST["batch_year"];
          $t2="MAX Package of each branch ".strval($ye2);
          echo "title:'".$t2."',";
          ?>
          width: 600,
          height: 400,
          backgroundColor: '#87CEEB'
          };

          var chart = new google.charts.Bar(document.getElementById('b_max'));
          chart.draw(data, google.charts.Bar.convertOptions(options));
        }


    </script>
<?php endif; ?>

<style>
    .button {
  background-color: #392A48;
  border: none;
  color: white;
  padding: 10px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 10px;
  margin: 4px 2px;
  cursor: pointer;
  width: 30%;
  border-radius: 5px;
}
.box{
  align:right;
  margin-left:1000px;
}
.head{
  align:center;
}
</style>
</head>
<body background-color="#87CEEB">
    
    <p class="head"><h1 >GENERAL TRENDS</h1></p>

    <form method = "post" novalidate >
        <div class="box">
        <label for = "batch_year" >Year</label>
        <input type ="batch_year"  id="batch_year" name = "batch_year" value="2022"><button class="button">SHOW TRENDS</button>
        </div>

        

    </form>
    
   
    
    <div id="c_place" style="width: 900px; height: 500px; margin-left: 350px"></div>
      <br>
    <div id="p_place" style="width: 900px; height: 500px; margin-left: 350px"></div>
        <br>
    <div id="c_high" style="width: 900px; height: 500px; margin-left: 400px"></div>
                              
    <br>
    <div id="b_high" style="width: 900px; height: 500px; margin-left: 400px"></div>

    <br>
    <div id="b_max" style="width: 900px; height: 500px; margin-left: 400px"></div>
 
    
</body>
</html>