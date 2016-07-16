<?php
/**
 * Created by PhpStorm.
 * User: Shahinee
 * Date: 7/10/2016
 * Time: 3:03 PM
 */
session_start();
if(isset($_SESSION['login_user'])){
    session_destroy();
    unset($_SESSION["login_user"]);

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Logout</title>
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
        <h1>Log out</h1>
        <p> You are now log out. We will redirected in few second</p>


    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/index.js"></script>
<script src="js/jquery.form-validator.min.js"></script>
<script type="text/javascript">
setTimeout(function () {
      window.location.href = "login.html"; //will redirect to your blog page (an ex: blog.html)
   }, 5000);
</script>


<!--  <script type="text/javascript">
 $(function(){
   $.validate({
       form : '#registration'
     });
   })
 </script> -->

</body>
</html>
