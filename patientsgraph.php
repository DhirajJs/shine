<?php
/**
 * Created by PhpStorm.
 * User: Shahinee
 * Date: 7/10/2016
 * Time: 11:25 PM
 */
session_start();
include_once 'connection.php';
$docId = $_SESSION['login_user'];
$sql = "SELECT * FROM patient WHERE doctorId='".$docId."'";

$results = mysql_query($sql);
?>


<?php include_once 'welcome.php';?>
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
</head>
<body>




<div class="form">
    <div class="thumbnail"><i class="fa fa-user-md" aria-hidden="true"></i></div>
    <div class="dashboard">
        <h1>Patient List</h1>
        <?php while ($row = mysql_fetch_array($results)) : ?>
      
        <a href="progressandgraphs.php?patientId=<?php echo $row['patientId'];?>" class="button-link name-patient"><?php echo $row['name'];?></a>
      <?php endwhile; ?>
        <a class="button-link backbutton" href="dashboard.php"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/index.js"></script>
<script src="js/jquery.form-validator.min.js"></script>


<!--  <script type="text/javascript">
 $(function(){
   $.validate({
       form : '#registration'
     });
   })
 </script> -->

</body>
</html>




