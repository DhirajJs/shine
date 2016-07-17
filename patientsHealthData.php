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
?>
<html>
<body>
<h1>Patient list</h1>

<h3>Search  Patient Details</h3>
<p>You  may search either by Id or name</p>
<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
name:<input  type="text" name="nameSearch"><br/>
    patient id:<input  type="text" name="idSearch">
    <input  type="submit" name="Search" value="Search">
    <input  type="submit" name="Reset" value="Reset">
</form>

<?php
$sql = "SELECT * FROM patient WHERE doctorId='".$docId."'";
if(isset($_POST['Search'])):
    $nameSearch = $_POST['nameSearch'];
    $idSearch = $_POST['idSearch'];
    $sql = "SELECT * FROM patient WHERE doctorId='".$docId."' AND (patientId ='".$idSearch."' OR name LIKE'". $nameSearch."')";
endif;
if(isset($_POST['Reset'])):
    $sql = "SELECT * FROM patient WHERE doctorId='".$docId."'";
endif;
$results = mysql_query($sql);
?>



<table border="1">
    <tr><td>Patient Id</td><td>Name</td></tr>
    <?php while ($row = mysql_fetch_array($results)) : ?>
        <tr>
            <td><?php echo $row['patientId'];?></td>
            <td><?php echo $row['name'];?></td>
            <td>
                <form method="post" action="consultation.php">
                    <input type="submit" name="action" value="details"/>
                    <input type="hidden" name="id" value="<?php echo $row['patientId']; ?>"/>
                </form>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
</body>
</html>

