<?php
/**
 * Created by PhpStorm.
 * User: Joe_PC
 * Date: 12/12/2017
 * Time: 1:13 AM
 */
// Admin Login //
session_start();
include_once 'config.php';

// if (isset($_SESSION['admin']) != "") {
  //  header("Location: ../users/admi/home.html");
//}
$login = "";
if (isset($_REQUEST['login_btn'])) {
    $username = $conn->real_escape_string(strtoupper($_POST['uname']));
    $password = hash("sha256", $_POST['pass']);


    $query = "SELECT * FROM nacoss_admin WHERE username='$username' OR email='$username'";
    $response = $conn->query($query);
    $row = mysqli_fetch_array($response);

    if ($row['password'] == $password) {
        //$result['success'] = "Successfully Logged in <br/><marquee>redirecting...</marquee><a class='btn btn-link' href=\"../index.php\">Click Here to login</a>";
        $_SESSION['admin'] = $row['username'];
        header("Location: users/admi/index.php");
    } else {
        $login='Login Failed... Try again';

    }


}
?>
