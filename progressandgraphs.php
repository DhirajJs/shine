<?php 
session_start();

include_once 'welcome.php';
include_once 'connection.php';
$docId = $_SESSION['login_user'];
if(isset($_GET['patientId']) && !empty($_GET['patientId'])) {
$sql = "SELECT * FROM diabetes WHERE patientId='{$_GET['patientId']}' order by `date` asc";
$sqlBP = "SELECT * FROM bloodpressure WHERE patientId='{$_GET['patientId']}' order by `date` asc";
$resultsDiabetes = mysql_query($sql);
$resultsBP = mysql_query($sqlBP);
}else {
  header('Location pateintsgraph.php');
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
          rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/remodal.css">
  <link rel="stylesheet" href="css/remodal-default-theme.css">
</head>
<body>




<div class="form">
    <div class="thumbnail"><i class="fa fa-user-md" aria-hidden="true"></i></div>
    <div class="dashboard">
        <h1>Progress and Graphs</h1>
        <a href="#diabetes" id="diabetes" class="button-link">Diabetes</a>
        <a href="#bloodpressure"  id="bloodpressure" class="button-link">Blood Pressure</a>
        
        <a class="button-link backbutton" href="patientgraph.php"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
     
    </div>
</div>
<div class="diabetes-model" data-remodal-id="diabetes">
  <button data-remodal-action="close" class="remodal-close"></button>
  
  <div id="chart_div_diabetes"></div>
  <br>
 
</div>
<div class="diabetes-model" data-remodal-id="bloodpressure">
  <button data-remodal-action="close" class="remodal-close"></button>
  <div id="chart_div_bp"></div>

  <br>
  </div>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/index.js"></script>
<script src="js/jquery.form-validator.min.js"></script>
<script src="js/remodal.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

 <script type="text/javascript">
 $(function(){
   
    $('[data-remodal-id=diabetes]').remodal();
    $('[data-remodal-id=bloodpressure]').remodal();

    google.charts.load('current', {packages: ['corechart', 'line']});
    google.charts.setOnLoadCallback(drawBasicDiabeted);
    google.charts.setOnLoadCallback(drawBasicBloodPressure);

function drawBasicDiabeted() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'X');
      data.addColumn('number', 'Diabetes progess');
      var diabetesAr = new Array();
  <?php 
     $array = array();
    
     while ($row = mysql_fetch_array($resultsDiabetes)) {

        $time =  date('d', strtotime($row['date']));
        $array[] = "[{$time},{$row['bloodSugarLevel']}]";
     } 
      $addRow = implode(',',$array);

     ?>

      data.addRows([<?php echo $addRow ?>]);
  
      
      var options = {
        hAxis: {
          title: 'Day'
        },
        vAxis: {
          title: 'Blood Sugar Level'
        },
         
        width: 500,
        height: 500
      
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div_diabetes'));

      chart.draw(data, options);
    }
   

function drawBasicBloodPressure() {

      var data = new google.visualization.DataTable();

      data.addColumn('number', 'Day');
      data.addColumn('number', 'Systolic');
      data.addColumn('number', 'Diastolic');
      data.addColumn('number', 'Heart Rate');
      //systolic`, `diastolic`, `patientId`, `heartRate`
      var bpl = new Array();
  <?php 
     $array = array();

     while ($row = mysql_fetch_array($resultsBP)) {

        $time =  date('d', strtotime($row['date']));
        $array[] = "[{$time},{$row['systolic']},{$row['diastolic']},{$row['heartRate']}]";
     } 
      $addRow = implode(',',$array);

     ?>

      data.addRows([<?php echo $addRow ?>]);

      var options = {
        hAxis: {
          title: 'Day'
        },
        vAxis: {
          title: 'Blood Pressure'
        }
        ,
        width: 600,
        height: 500
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div_bp'));

      chart.draw(data, options);
    }
   });



 </script> 

</body>
</html>
