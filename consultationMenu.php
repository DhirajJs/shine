<?php
session_start();
include_once 'welcome.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>consultation menu</title>
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
        <h1>Consultation Menu</h1>
        <a href="signupPatient.html" class="button-link">New Patient</a>
        <a href="patientsHealthData.php" class="button-link">Existing Patient</a>
        <?php if(isset( $_SESSION['user']) &&  $_SESSION['user']['types']=='D'){?>
            <a href="patientsgraph.php" class="button-link">Statistics and Graphs</a>
        <?php } ?>
        <?php  if($isLogin) { ?>
            <a class="button-link" href="logout.php">Log out</a>
        <?php } ?>
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
