<?php
/**
 * Created by PhpStorm.
 * User: Shahinee
 * Date: 7/9/2016
 * Time: 10:41 PM
 */

$connection = mysql_connect("127.0.0.1", "root", "");

if(!$connection){
    die("Connection to sql server failed<br />".mysql_error());
}

$db = mysql_select_db("C252845_iot");

if(!$db){
    die("connection to db failed<br />".mysql_error());
}

?>
