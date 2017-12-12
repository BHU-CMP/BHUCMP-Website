<?php
/**
 * Created by PhpStorm.
 * User: Joe_PC
 * Date: 20/11/2017
 * Time: 3:37 PM
 */

session_start();
if (isset($_SESSION['user']) != "") {
    header("Location: ../users/home.php");
}
include "config.php";
error_reporting(''); // avoid notice


if (isset($_REQUEST['register'])) {

    if ($_POST['txt_pass'] == $_POST['txt_cpass']) {

        $matno = $conn->real_escape_string(trim($_POST['txt_matno']));
        $pass = $conn->real_escape_string(hash("sha256", $_POST['txt_pass']));
        $email = $conn->real_escape_string(trim($_POST['txt_email']));
        $fname = $conn->real_escape_string(trim($_POST['txt_fname']));
        $lname = $conn->real_escape_string(trim($_POST['txt_lname']));
        $status = $conn->real_escape_string(trim($_POST['txt_stat']));
        $gender = $conn->real_escape_string(trim($_POST['txt_gen']));
        $activity = 1;
        $image = $conn->real_escape_string($_FILES['avatar']['name']);

        $tmp_dir = $_FILES['avatar']['tmp_name'];
        $imgSize = $_FILES['avatar']['size'];


        $upload_dir = '../image/'; // upload directory. My problem

        $imgExt = strtolower(pathinfo($image, PATHINFO_EXTENSION)); // get image extension

        // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

        // rename uploading image
        $image = rand(1000, 1000000) . "." . $imgExt;

        // allow valid image file formats
        if (in_array($imgExt, $valid_extensions)) {
            // Check file size '2MB'
            if ($imgSize < 2000000) {
                move_uploaded_file($tmp_dir, $upload_dir . $image);

                $checkUName = "SELECT * FROM login WHERE matno = '$matno'";
                $run = mysqli_query($conn, $checkUName);

                if (mysqli_num_rows($run) > 0) {
                    echo "<script type='application/javascript'>alert('Matric Number already registered. Input a different one. Refresh the page')</script>";
                    exit();
                }

                $checkName = "SELECT * FROM login WHERE email = '$email'";
                $rum = mysqli_query($conn, $checkName);

                if (mysqli_num_rows($rum) > 0) {
                    echo "<script type='application/javascript'>alert('Email already in use. Input a different one. Refresh the page')</script>";
                    exit();
                }
                $side = "INSERT INTO login (matno, password, email, fname, lname, status, image, activitystate, gender) VALUES ('{$matno}','{$pass}','{$email}','{$fname}','{$lname}','{$status}','{$image}','{$activity}','{$gender}')";

                $data = mysqli_query($conn, $side) or die(mysqli_error($conn));
                if ($data) {
                    echo "<script type='application/javascript'>alert('Successfully Registered')</script>";
                    header("location: ../index.php");

                } else {
                    header("Location: ../register.html");
                }
            } else {
                echo "<script type='application/javascript'>alert('Sorry, your image is too large.')</script>";
                header("Location: ../register.html");
            }
        } else {
            echo "<script type='application/javascript'>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
            header("Location: ../register.html");
        }
    } else {
        echo "<script type='application/javascript'>alert('Two password do not match.')</script>";
        header("Location: ../register.html");
    }
}

?>