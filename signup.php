<?php
$username = $_POST["username"];
$password = $_POST["password"];
$userId = $_POST["userId"];
$types = $_POST["types"];

include_once 'connection.php';
// create an MD5 hash of the password
$password = md5($password);

//check if user id exists before adding new user
$sql=mysql_query("SELECT * FROM users WHERE userId='".$userId."'");
if(mysql_num_rows($sql)>=1)
{
    echo"user id already exists try again!";
}
else
{
    // save the values to the database
    $sql = "INSERT INTO users (username, password,userId,types) VALUES ('".$username."','". $password."','".$userId."','".$types."')";

    $res = mysql_query($sql);
    if($res){
        echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='signin.php'>Login</a></div>";

    }else{
        echo "Error while creating user";
    }

}
?>