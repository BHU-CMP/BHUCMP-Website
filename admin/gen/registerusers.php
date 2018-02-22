<?php
/**
 * Created by PhpStorm.
 * User: Joe_PC
 * Date: 20/11/2017
 * Time: 3:37 PM
 */


$register='';
if (isset($_REQUEST['btnsave'])) {

    if ($_POST['txt_pass'] == $_POST['txt_cpass']) {

        $matno = $conn->real_escape_string(trim($_POST['txt_matno']));
        $pass = $conn->real_escape_string(password_hash($_POST['txt_pass'], PASSWORD_BCRYPT));
        $email = $conn->real_escape_string(trim($_POST['txt_email']));
        $fname = $conn->real_escape_string(trim($_POST['txt_fname']));
        $lname = $conn->real_escape_string(trim($_POST['txt_lname']));
        $status = $conn->real_escape_string(trim($_POST['txt_stat']));
        $gender = $conn->real_escape_string(trim($_POST['txt_gen']));
        $level = $conn->real_escape_string($_POST['txt_level']);
        $online = "Online";
        $activity = "Activated";
        $date = date("d:m:y");
        $image = $conn->real_escape_string($_FILES['avatar']['name']);
        $tmp_dir = $_FILES['avatar']['tmp_name'];
        $imgSize = $_FILES['avatar']['size'];

        $upload_dir = '../../image/'; // upload directory.

        $imgExt = strtolower(pathinfo($image, PATHINFO_EXTENSION)); // get image extension

        // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

        // rename uploading image
        $image = $fname.$lname . "." . $imgExt;

        // allow valid image file formats
        if (in_array($imgExt, $valid_extensions)) {
            // Check file size '2MB'
            if ($imgSize < 2000000) {
                move_uploaded_file($tmp_dir, $upload_dir . $image);

                $checkUName = "SELECT * FROM login WHERE matno = '$matno'";
                $run = mysqli_query($conn, $checkUName);
                if (mysqli_num_rows($run) > 0) {
                    $register='Matric Number already registered, Try a different one';
                }

                $checkName = "SELECT * FROM login WHERE email = '$email'";
                $rum = mysqli_query($conn, $checkName);

                if (mysqli_num_rows($rum) > 0) {
                    $register='Email already in use';
                }
                $side = "INSERT INTO login (matno, password, email, fname, lname, status, image, activitystate, gender, level, online, date) 
                VALUES ('{$matno}','{$pass}','{$email}','{$fname}','{$lname}','{$status}','{$image}','{$activity}','{$gender}','{$level}','{$online}','{$date}')";

                $data = mysqli_query($conn, $side) or die(mysqli_error($conn));
                if ($data) {
                    $register='Successfully Registered';
                } else {
                    $register='Sorry an error occured. Please try again later...';
                }
            } else {
                $register='Sorry, your image is too large.';
            }
        } else {
            $register='Only JPG, JPEG, PNG & GIF files are allowed.';
        }
    } else {
        $register='Password do not match.';
    }
}

?>
