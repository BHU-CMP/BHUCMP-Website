<?php
/**
 * Created by PhpStorm.
 * User: Joe_PC
 * Date: 20/11/2017
 * Time: 3:37 PM
 */
session_start();
include "../../gen/config.php";
if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
} else if (isset($_SESSION['admin']) != "") {
    header("Location: ../users/home.html");
}

error_reporting(''); // avoid notice


if (isset($_REQUEST['registeradmin'])) {

    if ($_POST['txt_pass'] == $_POST['txt_cpass']) {

        $username = $conn->real_escape_string(trim($_POST['txt_user']));
        $pass = $conn->real_escape_string(hash("sha256", $_POST['txt_pass']));
        $email = $conn->real_escape_string(trim($_POST['txt_email']));
        $fname = $conn->real_escape_string(trim($_POST['txt_fname']));
        $lname = $conn->real_escape_string(trim($_POST['txt_lname']));
        $activity = 1;

        $checkUName = "SELECT * FROM nacoss_admin WHERE username = '$username'";
        $run = mysqli_query($conn, $checkUName);

        if (mysqli_num_rows($run) > 0) {
            echo "<script type='application/javascript'>alert('Matric Number already registered. Input a different one. Refresh the page')</script>";
            header("Location: ../register.php");
            exit();
        }

        $checkName = "SELECT * FROM nacoss_admin WHERE email = '$email'";
        $rum = mysqli_query($conn, $checkName);

        if (mysqli_num_rows($rum) > 0) {
            echo "<script type='application/javascript'>alert('Email already in use. Input a different one. Refresh the page')</script>";
            header("Location: ../register.php");
            exit();
        }
        $side = "INSERT INTO nacoss_admin (username, password, email, fname, lname, activitystate) VALUES ('{$username}','{$pass}','{$email}','{$fname}','{$lname}','{$activity}')";

        $data = mysqli_query($conn, $side) or die(mysqli_error($conn));
        if ($data) {
            echo "<script type='application/javascript'>alert('Successfully Registered as Admin')</script>";
            header("location: ../index.php");

        } else {
            echo "<script type='application/javascript'>alert('Sorry an Error Occured. Please try again or later...')</script>";
            header("Location: ../register.php");
        }
    } else {
        echo "<script type='application/javascript'>alert('Two password do not match.')</script>";
        header("Location: ../register.php");
    }

}

?>