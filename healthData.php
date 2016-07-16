<?php
/**
 * Created by PhpStorm.
 * User: Shahinee
 * Date: 7/11/2016
 * Time: 9:58 PM
 */
session_start();
include_once 'connection.php';
$docId = $_SESSION['login_user'];
?>
<html>
<body>
<table border="1">
    <?php
    if ($_POST['action'] && $_POST['id']):
        if ($_POST['action'] == 'diabetes'):
            $sql = "SELECT * FROM diabetes WHERE patientId='" . $_POST['id'] . "'";
            $results = mysql_query($sql); ?>
            <p>Diabetes Details</p>
            <tr>
                <td>Date</td>
                <td>Blood Sugar Level</td>
            </tr>
            <?php while ($row = mysql_fetch_array($results)): ?>
            <tr>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['bloodSugarLevel']; ?></td>
            </tr>
        <?php endwhile; ?>
        <?php endif; ?>
        <?php if ($_POST['action'] == 'bloodpressure'):
        $sql = "SELECT * FROM bloodpressure WHERE patientId='" . $_POST['id'] . "'";
        $results = mysql_query($sql); ?>
        <p>Blood Pressure Details</p>
        <tr>
            <td>Date</td>
            <td>Systolic</td>
            <td>Diastolic</td>
            <td>Heart Rate</td>
        </tr>
        <?php while ($row = mysql_fetch_array($results)): ?>
        <tr>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['systolic']; ?></td>
            <td><?php echo $row['diastolic']; ?></td>
            <td><?php echo $row['heartRate']; ?></td>
        </tr>
    <?php endwhile; ?>
    <?php endif; ?>
    <?php endif; ?>
</table>
</body>
</html>
