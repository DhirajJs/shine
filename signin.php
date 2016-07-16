<!DOCTYPE>
<html>
    <body>

    <?php
    $myusername = $_POST["username"];
    $mypassword = $_POST["password"];

    session_start();
    include_once 'connection.php';

    $sql = "SELECT * FROM users WHERE username='" . $myusername . "' AND password =MD5('" . $mypassword . "')";
    $res = mysql_query($sql);
    $row = mysql_fetch_array($res);

    if ($row > 0) {
        $_SESSION['login_user'] = $row['userId'];
        $_SESSION['user'] = $row;
        header("Location: dashboard.php");
    } else {
        echo "Wrong credentials";
    }

    ?>

    </body>
</html>