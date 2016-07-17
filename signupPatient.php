<?php
session_start();
//sign up for patient
$username = $_POST["username"];
$password = $_POST["password"];
$userId = $_POST["userId"];
$types = 'P';

//adding patient details
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$dob = $_POST["dob"];
$docId = $_SESSION['login_user'];

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
    // save the values to table
    $sql = "INSERT INTO users (username, password,userId,types) VALUES ('".$username."','". $password."','".$userId."','".$types."')";
    $sql1= "INSERT INTO patient (doctorId,name,email,phone,address,dob,patientId) VALUES ('".$docId."','". $name."','".$email."','".$phone."','".$address."','".$dob."','".$userId."')";
    $res = mysql_query($sql);
    $res1 = mysql_query($sql1);

    if($res){
       header("Location: consultation.php?patient_id=$userId");

    }else{
        echo "Error while creating user";
    }

}
?>