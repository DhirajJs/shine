<?php

//sign up for doctors
$username = $_POST["username"];
$password = $_POST["password"];
$types = 'D';

//adding doc details
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$dob = $_POST["dob"];

include_once 'connection.php';
// create an MD5 hash of the password
$password = md5($password);

//check if user id exists before adding new user
$sql=mysql_query("SELECT * FROM users WHERE userId='".$username."'");
if(mysql_num_rows($sql)>=1)
{
    echo"user id already exists try again!";
}
else
{
    // save the values to table
    $sql = "INSERT INTO users (username, password,userId,types) VALUES ('".$username."','". $password."','".$username."','".$types."')";
    $sql1= "INSERT INTO doctor (doctorId,name,email,phone,address,dob) VALUES ('".$username."','". $name."','".$email."','".$phone."','".$address."','".$dob."')";
    $res = mysql_query($sql);
    $res1 = mysql_query($sql1);

    if($res){
        header("Location: consultation.php?patient");

    }else{
        echo "Error while creating user";
    }

}
?>