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
        if ($_POST['action'] == 'consultation'):
            $sql = "SELECT * FROM consultation WHERE patientId='" . $_POST['id'] . "'". "AND doctorId='" . $docId . "'";
            $results = mysql_query($sql); ?>
            <p>Diabetes Details</p>
            <tr>
                <td>Weight</td>
                <td>Medication</td>
                <td>Date</td>
            </tr>
            <?php while ($row = mysql_fetch_array($results)): ?>
            <tr>
                <td><?php echo $row['weight']; ?></td>
                <td><?php echo $row['medication']; ?></td>
                <td><?php echo $row['date']; ?></td>
            </tr>
            <?php endwhile; ?>
        <?php endif; ?>

    <?php endif; ?>
</table>
</body>
</html>
