<?php
/**
 * Created by PhpStorm.
 * User: Joe_PC
 * Date: 20/11/2017
 * Time: 3:37 PM
 */
session_start();
include "config.php";

$adm='';

if (isset($_REQUEST['registeradmin'])) {

    if ($_POST['txt_pass'] == $_POST['txt_cpass']) {

        $username = $conn->real_escape_string(trim($_POST['txt_user']));
        $pass = $conn->real_escape_string(hash("sha256", $_POST['txt_pass']));
        $email = $conn->real_escape_string(trim($_POST['txt_email']));
        $fname = $conn->real_escape_string(trim($_POST['txt_fname']));
        $lname = $conn->real_escape_string(trim($_POST['txt_lname']));

        $checkUName = "SELECT * FROM nacoss_admin WHERE username = '$username'";
        $run = mysqli_query($conn, $checkUName);

        if (mysqli_num_rows($run) > 0) {
            $adm='Matric Number already registered.';

        }

        $checkName = "SELECT * FROM nacoss_admin WHERE email = '$email'";
        $rum = mysqli_query($conn, $checkName);

        if (mysqli_num_rows($rum) > 0) {
            $adm='Email already in use.';
        }
        $side = "INSERT INTO nacoss_admin (username, password, email, fname, lname) VALUES ('{$username}','{$pass}','{$email}','{$fname}','{$lname}')";

        $data = mysqli_query($conn, $side) or die(mysqli_error($conn));
        if ($data) {
            $adm='Successfully Registered as Admin';
        } else {
            $adm='Sorry an Error Occured. Please try again or later...';
        }
    } else {
        $adm='Two password do not match.';
    }

}

?>