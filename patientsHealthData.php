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
<html>
<body>
<h1>Patient list</h1>
<table border="1">
    <tr><td>Patient Id</td><td>Name</td><td>Age</td></tr>
    <?php while ($row = mysql_fetch_array($results)) : ?>
        <tr>
            <td><?php echo $row['patientId'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['age'];?></td>
            <td>
                <form method="post" action="healthData.php">
                    <input type="submit" name="action" value="diabetes"/>
                    <input type="submit" name="action" value="bloodpressure"/>
                    <input type="hidden" name="id" value="<?php echo $row['patientId']; ?>"/>
                </form>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
</body>
</html>



