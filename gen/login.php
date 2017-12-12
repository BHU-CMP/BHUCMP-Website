<?php
/**
 * Created by PhpStorm.
 * User: Joe_PC
 * Date: 12/12/2017
 * Time: 1:13 AM
 */

session_start();
include_once 'config.php';
$result[] = "";

if (isset($_REQUEST['login_btn'])) {
    $username = $conn->real_escape_string(strtoupper($_POST['uname']));
    $password = hash("sha256", $_POST['pass']);


    $query = "SELECT * FROM login WHERE matno='$username' OR email='$username'";
    $response = $conn->query($query);
    $row = mysqli_fetch_array($response);

    if ($row['password'] == $password) {
        //$result['success'] = "Successfully Logged in <br/><marquee>redirecting...</marquee><a class='btn btn-link' href=\"../index.php\">Click Here to login</a>";
        $_SESSION['user'] = $row['matno'];
        header("Location: ../users/home.php");
    } else {
        echo '<script type="application/javascript">alert("Login Failed...")</script>';
        header("Location: ../login.html");

    }


}
?>
