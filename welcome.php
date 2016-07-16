<?php session_start();
  $isLogin = false;
if(isset($_SESSION['login_user'])) {
  $isLogin = true;
}
else{
    header( "Location: login.html" );
}
