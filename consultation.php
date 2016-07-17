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
<h1>Patient View</h1>

<!---->
<?php
//if (isset($_POST['updatePatient'])):
//    $update = "UPDATE patient SET name='" . $_POST['pname'] . "',email='" . $_POST['pemail'] . "'
//     ,dob='" . $_POST['pdob'] . "' ,phone='" . $_POST['pphone'] . "',address='" . $_POST['paddress'] . "'
//     WHERE patientId=" . $_POST['patientId'];
//    mysql_query($update);
//endif;
//?>

<?php
if ($_POST['id']):
    //patient details
    $sql1 = "SELECT * FROM patient WHERE patientId='" . $_POST['id'] . "'" . "AND doctorId='" . $docId . "'";
    $results = mysql_query($sql1); ?>

    <h2>Patient Details</h2>

    <?php while ($row = mysql_fetch_array($results)): ?>

    Name:<input type="text" name="pname" value="<?php echo $row['name'] ?>" ?><br/>
    Email:<input type="text" name="pemail" value="<?php echo $row['email'] ?>" ?><br/>
    DOB: <input type="text" name="pdob" value="<?php echo $row['dob'] ?>" ?><br/>
    Phone: <input type="text" name="pphone" value="<?php echo $row['phone'] ?>" ?><br/>
    Address: <input type="text" name="paddress" value="<?php echo $row['address'] ?>" ?><br/>

<!--    <form method="post" action="--><?php //echo htmlspecialchars($_SERVER["PHP_SELF"]); ?><!--">-->
<!--        <input type="submit" name="updatePatient" value="update"/>-->
<!--        <input type="hidden" name="patientId" value="--><?php //echo $row['patientId']; ?><!--"/>-->
<!--    </form>-->


<?php endwhile; ?>
    <br/>
    <?php //consultation details
    $sql = "SELECT * FROM consultation WHERE patientId='" . $_POST['id'] . "'" . "AND doctorId='" . $docId . "'";
    $results = mysql_query($sql); ?>
    <table border="1">
        <tr>
            <th>Consultation Details</th>
        </tr>
        <tr>
            <td>BMI</td>
            <td>Medication</td>
            <td>Date</td>
            <td>Consultation comment</td>
        </tr>
        <?php while ($row = mysql_fetch_array($results)): ?>
            <tr>
                <td><?php echo $row['bmi']; ?></td>
                <td><?php echo $row['medication']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['consultation_details']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <br/>
    <?php //diabetes details
    $sql2 = "SELECT * FROM diabetes WHERE patientId='" . $_POST['id'] . "'";
    $results = mysql_query($sql2); ?>
    <table border="1">
        <tr>
            <th>Diabetes</th>
        </tr>
        <tr>
            <td>Date</td>
            <td>Blood sugar level</td>
        </tr>
        <?php while ($row = mysql_fetch_array($results)): ?>
            <tr>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['bloodSugarLevel']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <br/>
    <?php //bp details
    $sql3 = "SELECT * FROM bloodpressure WHERE patientId='" . $_POST['id'] . "'";
    $results = mysql_query($sql3); ?>
    <table border="1">
        <tr>
            <th>Blood pressure</th>
        </tr>
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
    </table>

<?php endif; ?>
<?php if ($_GET['patient_id']):
    //patient details
    $sql1 = "SELECT * FROM patient WHERE patientId='" . $_GET['patient_id'] . "'" . "AND doctorId='" . $docId . "'";
    $results = mysql_query($sql1); ?>
    <table border="1">
        <tr>
            <th>Patient Details</th>
        </tr>
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>DOB</td>
            <td>Phone</td>
            <td>Address</td>
        </tr>
        <?php while ($row = mysql_fetch_array($results)): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['dob']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['address']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <br/>

    <?php //get consultation details
    $sql = "SELECT * FROM consultation WHERE patientId='" . $_GET['patient_id'] . "'" . "AND doctorId='" . $docId . "'";
    $results = mysql_query($sql); ?>
    <table border="1">
        <tr>
            <th>Consultation Details</th>
        </tr>
        <tr>
            <td>BMI</td>
            <td>Medication</td>
            <td>Date</td>
            <td>Consultation comment</td>
        </tr>
        <?php while ($row = mysql_fetch_array($results)): ?>
            <tr>
                <td><?php echo $row['bmi']; ?></td>
                <td><?php echo $row['medication']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['consultation_details']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <br/>
    <?php //diabetes details
    $sql = "SELECT * FROM diabetes WHERE patientId='" . $_GET['patient_id'] . "'";
    $results = mysql_query($sql); ?>
    <table border="1">
        <tr>
            <th>Diabetes</th>
        </tr>
        <tr>
            <td>Date</td>
            <td>Blood sugar level</td>
        </tr>
        <?php while ($row = mysql_fetch_array($results)): ?>
            <tr>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['bloodSugarLevel']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <br/>
    <?php //bp details
    $sql = "SELECT * FROM bloodpressure WHERE patientId='" . $_GET['patient_id'] . "'";
    $results = mysql_query($sql); ?>
    <table border="1">
        <tr>
            <th>Blood Pressure</th>
        </tr>
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
    </table>
<?php endif; ?>

</body>
</html>
