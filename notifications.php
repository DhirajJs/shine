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
    if (isset($_POST['approvedNow'])):
        $update = "UPDATE notifications SET approved='Y' WHERE notif_id=" . $_POST['notif_id'];
        mysql_query($update);
    endif;
    ?>

    <?php
    $sql = "SELECT
  notifications.`notif_id`,notifications.`date`,notifications.`request`,notifications.`approved`,patient.`name`,patient.`name`,patient.`email`,patient.`phone`
FROM notifications
  LEFT JOIN patient ON patient.patientId = notifications.patientId
WHERE (notifications.doctorId ='" . $docId . "')";

    $results = mysql_query($sql); ?>
    <p>Notifications</p>
    <tr>
        <td>Date</td>
        <td>Request</td>
        <td>Patient Name</td>
        <td>Patient Email</td>
        <td>Patient Phone</td>
        <td>Approved</td>

    </tr>


    <?php while ($row = mysql_fetch_array($results)): ?>
        <tr>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['request']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['approved']; ?></td>
            <?php if ($row['approved'] == 'N'): ?>
                <td>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <input type="submit" name="approvedNow" value="Approve now"/>
                        <input type="hidden" name="notif_id" value="<?php echo $row['notif_id']; ?>"/>
                    </form>
                </td>
            <?php endif; ?>
        </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
